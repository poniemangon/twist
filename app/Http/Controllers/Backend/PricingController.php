<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\PricingsModel;
use App\Models\PricingBenefitsModel;

class PricingController extends Controller {

    public function list(Request $request) {

        $title = 'Pricings | List | Twist Administration';

        $filterSource = false;

        if ($request->has('source') && $request->input('source') != '') {
            $filterSource = $request->input('source');
        }

        $totalPricings = PricingsModel::count();

        $pricings = PricingsModel::select('pricing_id', 'title', 'subtitle', 'price', 'period', 'is_open_gym_price')->when($filterSource, function($query, $filterSource) {
            return $query->where('title', 'LIKE', '%'.$filterSource.'%');
        })->orderBy('pricing_id', 'desc')->get();

        $filtersParameters = [
            'filterSource' => $filterSource
        ];

        $scripts = array('pricings.js');

        return view('backend.pricings.list', compact('title', 'totalPricings', 'pricings', 'filtersParameters', 'scripts'));
    }
    
    public function register() {

        $title = 'Pricings | Registration | Twist Administration';

        $scripts = array('pricings.js');

        return view('backend.pricings.register', compact('title', 'scripts'));
    } 

    public function edit($pricingId) {

        $pricingData = PricingsModel::where('pricing_id', $pricingId)->first();

        if (!$pricingData) {
            return redirect('twist-administration/pricings-list');
        }

        $title = 'Pricings | Edition | Twist Administration';

        $pricingData->pricingBenefits = PricingBenefitsModel::where('pricing_id', $pricingData->pricing_id)->orderBy('pricing_benefit_id', 'asc')->get();

        $scripts = array('pricings.js');

        return view('backend.pricings.edit', compact('title', 'pricingData', 'scripts'));
    } 

    public function registerPricing(Request $request) {

        $messages = [
            'title.required' => 'You must enter the title',
            'price.required' => 'You must enter the price',
            'period.required' => 'You must enter the period',
            'background_colour.required' => 'You must select the colour'
        ];

        $validations = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'period' => 'required',
            'background_colour' => 'required'
        ], $messages);

        $title = $request->input('title');
        $isOpenGymPrice = $request->input('is_open_gym_price');
        $isOpenGymPrice = ($isOpenGymPrice) ? 1:0;
        $subtitle = $request->input('subtitle');
        $price = $request->input('price');
        $period = $request->input('period');
        $link = $request->input('link');
        $backgroundColour = $request->input('background_colour');
        $pricingBenefits = json_decode($request->input('pricingBenefits'), true);

        if (empty($pricingBenefits) || count($pricingBenefits) <= 0) {
            return response()->json(['success' => false, 'message' => 'You must add at least one benefit for this pricing card']);
        }

        $pricingsModel = new PricingsModel();
        $pricingsModel->title = $title;
        $pricingsModel->subtitle = $subtitle;
        $pricingsModel->price = $price;
        $pricingsModel->period = $period;
        $pricingsModel->link = $link;
        $pricingsModel->background_colour = $backgroundColour;
        $pricingsModel->is_open_gym_price = $isOpenGymPrice;
        $pricingsModel->save();
        $pricingId = $pricingsModel->id;

        foreach ($pricingBenefits as $benefit) {
            if ($benefit['benefit'] != '') {
                $pricingBenefitsModel = new PricingBenefitsModel();
                $pricingBenefitsModel->pricing_id = $pricingId;
                $pricingBenefitsModel->benefit = $benefit['benefit'];
                $pricingBenefitsModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pricing registered successfully',
            'pricingId' => $pricingId
        ]);
    }

    public function editPricing(Request $request, $pricingId) {

       $messages = [
            'title.required' => 'You must enter the title',
            'price.required' => 'You must enter the price',
            'period.required' => 'You must enter the period',
            'background_colour.required' => 'You must select the colour'
        ];

        $validations = $request->validate([
            'title' => 'required',
            'price' => 'required',
            'period' => 'required',
            'background_colour' => 'required'
        ], $messages);

        $title = $request->input('title');
        $isOpenGymPrice = $request->input('is_open_gym_price');
        $isOpenGymPrice = ($isOpenGymPrice) ? 1:0;
        $subtitle = $request->input('subtitle');
        $price = $request->input('price');
        $period = $request->input('period');
        $link = $request->input('link');
        $backgroundColour = $request->input('background_colour');
        $pricingBenefits = json_decode($request->input('pricingBenefits'), true);

        if (empty($pricingBenefits)) {
            return response()->json(['success' => false, 'message' => 'You must add at least one benefit for this pricing card']);
        }

        PricingsModel::where('pricing_id', $pricingId)->update([
            'title' => $title,
            'subtitle' => $subtitle,
            'price' => $price,
            'period' => $period,
            'link' => $link,
            'background_colour' => $backgroundColour,
            'is_open_gym_price' => $isOpenGymPrice
        ]);

        PricingBenefitsModel::where('pricing_id', $pricingId)->delete();
        foreach ($pricingBenefits as $benefit) {
            if ($benefit['benefit'] != '') {
                $pricingBenefitsModel = new PricingBenefitsModel();
                $pricingBenefitsModel->pricing_id = $pricingId;
                $pricingBenefitsModel->benefit = $benefit['benefit'];
                $pricingBenefitsModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pricing edited successfully',
            'pricingId' => $pricingId
        ]);
    }

    public function deletePricing($pricingId) {

        $pricingData = PricingsModel::where('pricing_id', $pricingId)->first();

        if (!$pricingData) {
            return response()->json(['success' => false, 'message' => 'The pricing ID is invalid or non-existent']);
        }

        PricingsModel::where('pricing_id', $pricingId)->delete();
        PricingBenefitsModel::where('pricing_id', $pricingId)->delete();

        return response()->json(['success' => true, 'message' => 'The pricing has been successfully deleted']);
    }
}