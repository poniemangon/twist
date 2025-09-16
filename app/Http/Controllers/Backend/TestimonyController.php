<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//models 
use App\Models\TestimonialsModel;

class TestimonyController extends Controller {

    public function list(Request $request) {

        $title = 'Testimonials | List | Twist Administration';

        $filterSource = false;

        if ($request->has('source') && $request->input('source') != '') {
            $filterSource = $request->input('source');
        }

        $totalTestimonials = TestimonialsModel::count();

        $testimonials = TestimonialsModel::select('testimony_id', 'name', 'review', 'punctuation')->when($filterSource, function($query, $filterSource) {
            return $query->where('name', 'LIKE', '%'.$filterSource.'%');
        })->orderBy('testimony_id', 'desc')->get();

        $filtersParameters = [
            'filterSource' => $filterSource
        ];

        $scripts = array('testimonials.js');

        return view ('backend.testimonials.list', compact('title', 'totalTestimonials', 'testimonials', 'filtersParameters', 'scripts'));
    } 
    

    public function register() {

        $title = 'Testimonials | Registration | Twist Administration';

        $scripts = array('testimonials.js');

        return view ('backend.testimonials.register', compact('title', 'scripts'));
    } 

    public function edit($testimonyId) {

        $testimonyData = TestimonialsModel::where('testimony_id', $testimonyId)->first();

        if (!$testimonyData) {
            return redirect('twist-administration/testimonials-list');
        }

        $title = 'Testimonials | Edition | Twist Administration';

        $scripts = array('testimonials.js');

        return view ('backend.testimonials.edit', compact('title', 'testimonyData', 'scripts'));
    } 

    public function registerTestimony(Request $request) {

        $messages = [
            'name.required' => 'You must enter the username',
            'name.min' => 'The username must contain at least 3 characters',
            'name.max' => 'The username must contain less than 30 characters',
            'review.required' => 'You must enter the user review',
            'punctuation.required' => 'You must enter the user´s score',
            'colour.required' => 'Background colour is required'
        ];

        $validations = $request->validate([
            'name' => 'required|min:3|max:30',
            'review' => 'required',
            'punctuation' => 'required',
            'colour' => 'required'
        ], $messages);

        $name = $request->input('name');
        $review = $request->input('review');
        $punctuation = $request->input('punctuation');
        $colour = $request->input('colour');

        $testimonialsModel = new TestimonialsModel();
        $testimonialsModel->name = $name;
        $testimonialsModel->review = $review;
        $testimonialsModel->punctuation = $punctuation;
        $testimonialsModel->colour = $colour;
        $testimonialsModel->save();
        $testimonyId = $testimonialsModel->testimony_id;

        return response()->json([
            'success' => true,
            'message' => 'Testimony registered successfully',
            'testimonyId' => $testimonyId
        ]);
    }

    public function editTestimony(Request $request, $testimonyId) {

        $messages = [
            'name.required' => 'You must enter the username',
            'name.min' => 'The username must contain at least 3 characters',
            'name.max' => 'The username must contain less than 30 characters',
            'review.required' => 'You must enter the user review',
            'punctuation.required' => 'You must enter the user´s score',
            'colour.required' => 'Background colour is required'
        ];

        $validations = $request->validate([
            'name' => 'required|min:3|max:30',
            'review' => 'required',
            'punctuation' => 'required',
            'colour' => 'required'
        ], $messages);

        $name = $request->input('name');
        $review = $request->input('review');
        $punctuation = $request->input('punctuation');
        $colour = $request->input('colour');

        TestimonialsModel::where('testimony_id', $testimonyId)->update([
            'name' => $name,
            'review' => $review,
            'punctuation' => $punctuation,
            'colour' => $colour
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Testimony edited successfully',
            'testimonyId' => $testimonyId
        ]);
    }

    public function deleteTestimony($testimonyId) {

        $testimonyData = TestimonialsModel::where('testimony_id', $testimonyId)->first();

        if (!$testimonyData) {
            return response()->json(['success' => false, 'message' => 'The testimonial ID is invalid or non-existent']);
        }

        TestimonialsModel::where('testimony_id', $testimonyId)->delete();

        return response()->json(['success' => true, 'message' => 'The testimony has been successfully deleted']);
    }
}