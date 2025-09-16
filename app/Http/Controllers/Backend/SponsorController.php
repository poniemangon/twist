<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//libraries
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

//models
use App\Models\SponsorsModel;

class SponsorController extends Controller {

	public function list(Request $request) {

        $title = 'Sponsors | List | Twist Administration';

        $totalSponsors = SponsorsModel::count();

        $sponsors = SponsorsModel::orderBy('sponsor_id', 'desc')->get();

        $scripts = array('sponsors.js');

        return view ('backend.sponsors.list', compact('title', 'totalSponsors', 'sponsors', 'scripts'));
    } 
    
    public function register() {

    	$title = 'Sponsors | Registration | Twist Administration';

    	$scripts = array('sponsors.js');

    	return view('backend.sponsors.register', compact('title', 'scripts'));
    }

    public function edit($sponsorId) {

    	$sponsorData = SponsorsModel::where('sponsor_id', $sponsorId)->first();

    	if (!$sponsorData) {
    		return redirect('twist-administration/sponsors-list');
    	}

    	$title = 'Sponsors | Edition | Twist Administration';

    	$scripts = array('sponsors.js');

    	return view('backend.sponsors.edit', compact('title', 'sponsorData', 'scripts'));
    }

    public function registerSponsor(Request $request) {

    	$messages = [
            'logo.required' => 'You must upload a logo',
            'logo.mimes' => 'Only JPG, JPEG or PNG format are supported for the logo',
            'logo_alternative_text.required' => 'You must insert the logo alternative text'
        ];

        $validations = $request->validate([
            'logo' => 'required|mimes:jpg,jpeg,png',
            'logo_alternative_text' => 'required'
        ], $messages);
        
        $logo = $request->file('logo');
        $logoAlternativeText = $request->input('logo_alternative_text');
        $link = $request->input('link');
        $linkNewTab = $request->input('link_new_tab');
        $linkNewTab = ($linkNewTab) ? 1:0;

        $logoName = time() . '.' . $logo->getClientOriginalExtension();

        $manager = new ImageManager(new Driver());

        $destinationPath = public_path('/backend/images/sponsors/');
        $logoFile = $manager->read($logo);

        $logoFile->save($destinationPath . $logoName);

        $sponsorsModel = new SponsorsModel();
        $sponsorsModel->logo = $logoName;
        $sponsorsModel->logo_alternative_text = $logoAlternativeText;
        $sponsorsModel->link = $link;
        $sponsorsModel->link_new_tab = $linkNewTab;
        $sponsorsModel->save();
        $sponsorId = $sponsorsModel->sponsor_id;

        return response()->json(['success' => true, 'message' => 'Sponsor registered successfully', 'sponsorId' => $sponsorId]);
    }

    public function editSponsor(Request $request, $sponsorId) {

    	$messages = [
            'logo.mimes' => 'Only JPG, JPEG or PNG format are supported for the logo',
            'logo_alternative_text.required' => 'You must insert the logo alternative text'
        ];

        $validations = $request->validate([
            'logo' => 'nullable|mimes:jpg,jpeg,png',
            'logo_alternative_text' => 'required'
        ], $messages);
        
        $logo = $request->file('logo');
        $logoAlternativeText = $request->input('logo_alternative_text');
        $link = $request->input('link');
        $linkNewTab = $request->input('link_new_tab');
        $linkNewTab = ($linkNewTab) ? 1:0;

        if (!empty($logo)) {
	        $logoName = time() . '.' . $logo->getClientOriginalExtension();

	        $manager = new ImageManager(new Driver());

	        $destinationPath = public_path('/backend/images/sponsors/');
	        $logoFile = $manager->read($logo);

	        $logoFile->save($destinationPath . $logoName);

	        SponsorsModel::where('sponsor_id', $sponsorId)->update([
                'logo' => $logoName
	        ]);
	    }

	    SponsorsModel::where('sponsor_id', $sponsorId)->update([
            'link' => $link,
            'link_new_tab' => $linkNewTab
	    ]);

        return response()->json(['success' => true, 'message' => 'Sponsor edited successfully', 'sponsorId' => $sponsorId]);
    }

    public function deleteSponsor($sponsorId) {

        $sponsorData = SponsorsModel::where('sponsor_id', $sponsorId)->first();

        if (!$sponsorData) {
            return response()->json(['success' => false, 'message' => 'The sponsor ID is invalid or non-existent']);
        }

        SponsorsModel::where('sponsor_id', $sponsorId)->delete();

        return response()->json(['success' => true, 'message' => 'The sponsor has been successfully deleted']);
    }
}