<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models
use App\Models\PartyOptionsModel;
use App\Models\PartyOptionSuppliesModel;
use App\Models\PartyOptionPricesModel;

class PartyOptionController extends Controller {

	public function list(Request $request) {

        $title = 'Party Options | List | Twist Administration';

        $totalPartyOptions = PartyOptionsModel::count();

        $partyOptions = PartyOptionsModel::orderBy('party_option_id', 'desc')->get();

        $scripts = array('party-options.js');

        return view('backend.party-options.list', compact('title', 'totalPartyOptions', 'partyOptions', 'scripts'));
    }
    
    public function register() {

        $title = 'Party Options | Registration | Twist Administration';

        $usesCKeditor = true;

        $scripts = array('party-options.js');

        return view('backend.party-options.register', compact('title', 'usesCKeditor', 'scripts'));
    }

    public function edit($partyOptionId) {

        $partyOptionData = PartyOptionsModel::where('party_option_id', $partyOptionId)->first();

        if (!$partyOptionData) {
            return redirect('twist-administration/party-options-list');
        }

        $title = 'Party Options | Edition | Twist Administration';

        $partyOptionData->twistSupplier = PartyOptionSuppliesModel::where([['party_option_id', $partyOptionData->party_option_id], ['Supplier', 'Twist']])->orderBy('party_option_supply_id', 'asc')->get();
        $partyOptionData->customerSupplier = PartyOptionSuppliesModel::where([['party_option_id', $partyOptionData->party_option_id], ['Supplier', 'Customer']])->orderBy('party_option_supply_id', 'asc')->get();

        $partyOptionData->prices = PartyOptionPricesModel::where('party_option_id', $partyOptionData->party_option_id)->orderBy('party_option_price_id', 'asc')->get();

        $usesCKeditor = true;

        $scripts = array('party-options.js');

        return view('backend.party-options.edit', compact('title', 'partyOptionData', 'usesCKeditor', 'scripts'));
    }

    public function registerPartyOption(Request $request) {

        $messages = [
            'option_type.required' => 'You must enter the party option type',
            'background_colour.required' => 'You must select the colour',
            'description.required' => 'You must enter a description for this party option'
        ];

        $validations = $request->validate([
            'option_type' => 'required',
            'background_colour' => 'required',
            'description' => 'required'
        ], $messages);

        $optionType = $request->input('option_type');
        $backgroundColour = $request->input('background_colour');
        $partyOptionTwistSupplier = json_decode($request->input('partyOptionTwistSupplier'), true);
        $partyOptionCustomerSupplier = json_decode($request->input('partyOptionCustomerSupplier'), true);
        $partyOptionPrices = json_decode($request->input('partyOptionPrices'), true);
        $description = $request->input('description');

        $partyOptionsModel = new PartyOptionsModel();
        $partyOptionsModel->option_type = $optionType;
        $partyOptionsModel->background_colour = $backgroundColour;
        $partyOptionsModel->description = $description;
        $partyOptionsModel->save();
        $partyOptionId = $partyOptionsModel->id;

        foreach ($partyOptionTwistSupplier as $supply) {
            if ($supply['supply'] != '') {
                $partyOptionSuppliesModel = new PartyOptionSuppliesModel();
                $partyOptionSuppliesModel->party_option_id = $partyOptionId;
                $partyOptionSuppliesModel->supplier = 'Twist';
                $partyOptionSuppliesModel->supply = $supply['supply'];
                $partyOptionSuppliesModel->save();
            }
        }

        foreach ($partyOptionCustomerSupplier as $supply) {
            if ($supply['supply'] != '') {
                $partyOptionSuppliesModel = new PartyOptionSuppliesModel();
                $partyOptionSuppliesModel->party_option_id = $partyOptionId;
                $partyOptionSuppliesModel->supplier = 'Customer';
                $partyOptionSuppliesModel->supply = $supply['supply'];
                $partyOptionSuppliesModel->save();
            }
        }

        foreach ($partyOptionPrices as $price) {
            if ($price['price'] != '' && $price['description'] != '') {
                $partyOptionPricesModel = new PartyOptionPricesModel();
                $partyOptionPricesModel->party_option_id = $partyOptionId;
                $partyOptionPricesModel->price = $price['price'];
                $partyOptionPricesModel->description = $price['description'];
                $partyOptionPricesModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Party option registered successfully',
            'partyOptionId' => $partyOptionId
        ]);
    }

    public function editPartyOption(Request $request, $partyOptionId) {

        $messages = [
            'option_type.required' => 'You must enter the party option type',
            'background_colour.required' => 'You must select the colour',
            'description.required' => 'You must enter a description for this party option'
        ];

        $validations = $request->validate([
            'option_type' => 'required',
            'background_colour' => 'required',
            'description' => 'required'
        ], $messages);

        $optionType = $request->input('option_type');
        $backgroundColour = $request->input('background_colour');
        $partyOptionTwistSupplier = json_decode($request->input('partyOptionTwistSupplier'), true);
        $partyOptionCustomerSupplier = json_decode($request->input('partyOptionCustomerSupplier'), true);
        $partyOptionPrices = json_decode($request->input('partyOptionPrices'), true);
        $description = $request->input('description');


        PartyOptionsModel::where('party_option_id', $partyOptionId)->update([
            'option_type' => $optionType,
            'background_colour' => $backgroundColour,
            'description' => $description
        ]);

        PartyOptionSuppliesModel::where('party_option_id', $partyOptionId)->delete();
        foreach ($partyOptionTwistSupplier as $supply) {
            if ($supply['supply'] != '') {
                $partyOptionSuppliesModel = new PartyOptionSuppliesModel();
                $partyOptionSuppliesModel->party_option_id = $partyOptionId;
                $partyOptionSuppliesModel->supplier = 'Twist';
                $partyOptionSuppliesModel->supply = $supply['supply'];
                $partyOptionSuppliesModel->save();
            }
        }

        foreach ($partyOptionCustomerSupplier as $supply) {
            if ($supply['supply'] != '') {
                $partyOptionSuppliesModel = new PartyOptionSuppliesModel();
                $partyOptionSuppliesModel->party_option_id = $partyOptionId;
                $partyOptionSuppliesModel->supplier = 'Customer';
                $partyOptionSuppliesModel->supply = $supply['supply'];
                $partyOptionSuppliesModel->save();
            }
        }

        PartyOptionPricesModel::where('party_option_id', $partyOptionId)->delete();
        foreach ($partyOptionPrices as $price) {
            if ($price['price'] != '' && $price['description'] != '') {
                $partyOptionPricesModel = new PartyOptionPricesModel();
                $partyOptionPricesModel->party_option_id = $partyOptionId;
                $partyOptionPricesModel->price = $price['price'];
                $partyOptionPricesModel->description = $price['description'];
                $partyOptionPricesModel->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Party option edited successfully',
            'partyOptionId' => $partyOptionId
        ]);
    }

    public function deletePartyOption($partyOptionId) {

        $partyOptionData = PartyOptionsModel::where('party_option_id', $partyOptionId)->first();

        if (!$partyOptionData) {
            return response()->json(['success' => false, 'message' => 'The party option ID is invalid or non-existent']);
        }

        PartyOptionsModel::where('party_option_id', $partyOptionId)->delete();
        PartyOptionSuppliesModel::where('party_option_id', $partyOptionId)->delete();
        PartyOptionPricesModel::where('party_option_id', $partyOptionId)->delete();

        return response()->json(['success' => true, 'message' => 'The party option has been successfully deleted']);
    }
}