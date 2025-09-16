<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\KidsCampsPricingsModel;
use App\Models\KidsCampsPricesModel;
use App\Models\KidsCampsPricingFeaturesModel;

class KidCampController extends Controller {
    
    public function list(Request $request) {

        $title = 'Kids Camps Pricings | List | Twist Administration';

        $filterSource = false;

        if ($request->has('source') && $request->input('source') != '') {
            $filterSource = $request->input('source');
        }

        $totalKidCampsPricings = KidsCampsPricingsModel::count();

        $kidCampsPricings = KidsCampsPricingsModel::select('kid_camp_pricing_id', 'title', 'subtitle')->when($filterSource, function($query, $filterSource) {
            return $query->where('title', 'LIKE', '%'.$filterSource.'%');
        })->orderBy('kid_camp_pricing_id', 'desc')->get();

        $filtersParameters = [
            'filterSource' => $filterSource
        ];

        $scripts = array('kids-camps-pricings.js');

        return view('backend.kids-camps-pricings.list', compact('title', 'totalKidCampsPricings', 'kidCampsPricings', 'filtersParameters', 'scripts'));
    }
    
    public function register() {

        $title = 'Kids Camps Pricings | Registration | Twist Administration';

        $scripts = array('kids-camps-pricings.js');

        return view('backend.kids-camps-pricings.register', compact('title', 'scripts'));
    } 

    public function edit($kidCampPricingId) {

        $kidCampPricingData = KidsCampsPricingsModel::where('kid_camp_pricing_id', $kidCampPricingId)->first();

        if (!$kidCampPricingData) {
            return redirect('twist-administration/kids-camps-pricings-list');
        }

        $title = 'Kids Camps Pricings | Edition | Twist Administration';

        $kidCampPricingData->prices = KidsCampsPricesModel::where('kid_camp_pricing_id', $kidCampPricingData->kid_camp_pricing_id)->orderBy('kid_camp_price_list_id', 'asc')->get();
        $kidCampPricingData->kidCampsPricingFeatures = KidsCampsPricingFeaturesModel::where('kid_camp_pricing_id', $kidCampPricingData->kid_camp_pricing_id)->orderBy('kid_camp_pricing_feature_id', 'asc')->get();

        $scripts = array('kids-camps-pricings.js');

        return view('backend.kids-camps-pricings.edit', compact('title', 'kidCampPricingData', 'scripts'));
    } 

    public function registerKidCampPricing(Request $request) {

        $messages = [
            'title.required' => 'You must enter the title',
            'background_colour.required' => 'You must select the colour'
        ];

        $validations = $request->validate([
            'title' => 'required',
            'background_colour' => 'required'
        ], $messages);

        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $link = $request->input('link');
        $backgroundColour = $request->input('background_colour');
        $prices = json_decode($request->input('prices'), true);
        $pricingFeatures = json_decode($request->input('pricingFeatures'), true);

        if (empty($prices) || count($prices) <= 0) {
            return response()->json(['success' => false, 'message' => 'You must add at least one price for this pricing card']);
        }

        if (empty($pricingFeatures) || count($pricingFeatures) <= 0) {
            return response()->json(['success' => false, 'message' => 'You must add at least one feature for this pricing card']);
        }

        $kidsCampsPricingsModel = new KidsCampsPricingsModel();
        $kidsCampsPricingsModel->title = $title;
        $kidsCampsPricingsModel->subtitle = $subtitle;
        $kidsCampsPricingsModel->link = $link;
        $kidsCampsPricingsModel->background_colour = $backgroundColour;
        $kidsCampsPricingsModel->save();
        $kidCampPricingId = $kidsCampsPricingsModel->id;

        foreach ($prices as $price) {
        	if ($price['price'] != '' && $price['period'] != '') {
        		$kidsCampsPricesModel = new KidsCampsPricesModel();
        		$kidsCampsPricesModel->kid_camp_pricing_id = $kidCampPricingId;
        		$kidsCampsPricesModel->price = $price['price'];
        		$kidsCampsPricesModel->period = $price['period'];
        		$kidsCampsPricesModel->save();
        	}
        }

        foreach ($pricingFeatures as $feature) {
            if ($feature['feature'] != '') {
                $kidsCampsPricingFeaturesModel = new KidsCampsPricingFeaturesModel();
                $kidsCampsPricingFeaturesModel->kid_camp_pricing_id = $kidCampPricingId;
                $kidsCampsPricingFeaturesModel->feature = $feature['feature'];
                $kidsCampsPricingFeaturesModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Kid camp pricing registered successfully',
            'kidCampPricingId' => $kidCampPricingId
        ]);
    }

    public function editKidCampPricing(Request $request, $kidCampPricingId) {

       $messages = [
            'title.required' => 'You must enter the title',
            'background_colour.required' => 'You must select the colour'
        ];

        $validations = $request->validate([
            'title' => 'required',
            'background_colour' => 'required'
        ], $messages);

        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $link = $request->input('link');
        $backgroundColour = $request->input('background_colour');
        $prices = json_decode($request->input('prices'), true);
        $pricingFeatures = json_decode($request->input('pricingFeatures'), true);

        if (empty($prices) || count($prices) <= 0) {
            return response()->json(['success' => false, 'message' => 'You must add at least one price for this pricing card']);
        }

        if (empty($pricingFeatures) || count($pricingFeatures) <= 0) {
            return response()->json(['success' => false, 'message' => 'You must add at least one feature for this pricing card']);
        }

        KidsCampsPricingsModel::where('kid_camp_pricing_id', $kidCampPricingId)->update([
            'title' => $title,
            'subtitle' => $subtitle,
            'link' => $link,
            'background_colour' => $backgroundColour
        ]);

        KidsCampsPricesModel::where('kid_camp_pricing_id', $kidCampPricingId)->delete();
        foreach ($prices as $price) {
        	if ($price['price'] != '' && $price['period'] != '') {
        		$kidsCampsPricesModel = new KidsCampsPricesModel();
        		$kidsCampsPricesModel->kid_camp_pricing_id = $kidCampPricingId;
        		$kidsCampsPricesModel->price = $price['price'];
        		$kidsCampsPricesModel->period = $price['period'];
        		$kidsCampsPricesModel->save();
        	}
        }

        KidsCampsPricingFeaturesModel::where('kid_camp_pricing_id', $kidCampPricingId)->delete();
        foreach ($pricingFeatures as $feature) {
            if ($feature['feature'] != '') {
                $kidsCampsPricingFeaturesModel = new KidsCampsPricingFeaturesModel();
                $kidsCampsPricingFeaturesModel->kid_camp_pricing_id = $kidCampPricingId;
                $kidsCampsPricingFeaturesModel->feature = $feature['feature'];
                $kidsCampsPricingFeaturesModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Kid camp pricing edited successfully',
            'kidCampPricingId' => $kidCampPricingId
        ]);
    }

    public function deleteKidCampPricing($kidCampPricingId) {

        $kidCampPricingData = KidsCampsPricingsModel::where('kid_camp_pricing_id', $kidCampPricingId)->first();

        if (!$kidCampPricingData) {
            return response()->json(['success' => false, 'message' => 'The pricing ID is invalid or non-existent']);
        }

        KidsCampsPricingsModel::where('kid_camp_pricing_id', $kidCampPricingId)->delete();
        KidsCampsPricesModel::where('kid_camp_pricing_id', $kidCampPricingId)->delete();
        KidsCampsPricingFeaturesModel::where('kid_camp_pricing_id', $kidCampPricingId)->delete();

        return response()->json(['success' => true, 'message' => 'The kid camp pricing has been successfully deleted']);
    }
}