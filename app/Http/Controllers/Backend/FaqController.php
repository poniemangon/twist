<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

//models 
use App\Models\FaqsModel;

class FaqController extends Controller {
    
    public function list(Request $request) {

        $title = 'Faqs | List | Twist Administration';

        $filterSource = false;

        if ($request->has('source') && $request->input('source') != '') {
            $filterSource = $request->input('source');
        }

       $totalFaqs = FaqsModel::count();

       $faqs = FaqsModel::when($filterSource, function($query, $filterSource) {
            return $query->where('question', 'LIKE', '%'.$filterSource.'%');
       })->orderBy('faq_id', 'desc')->get();

        $filtersParameters = [
            'filterSource' => $filterSource
        ];

        $pagesList = FaqsModel::orderBy('page', 'asc')->groupBy('page')->get();

        if (!empty($pagesList) && count($pagesList) > 0) {
        	foreach ($pagesList as $page) {
        		$page->pageSegment = Str::slug(Str::limit($page->page, 200, ''));
        		$page->pagesFaqs = FaqsModel::where('page', $page->page)->orderBy('order', 'asc')->get();
        	}
        }

        $scripts = array('faqs.js');

        return view ('backend.faqs.list', compact('title', 'totalFaqs', 'faqs', 'filtersParameters', 'pagesList', 'scripts'));
    } 
    

    public function register() {

        $title = 'Faqs | Registration | Twist Administration';

        $usesCKeditor = true;

        $scripts = array('faqs.js');

        return view ('backend.faqs.register', compact('title', 'usesCKeditor', 'scripts'));
    } 

    public function edit($faqId) {

        $faqData = FaqsModel::where('faq_id', $faqId)->first();

        if (!$faqData) {
            return redirect('twist-administration/faqs-list');
        }

        $title = 'Faqs | Edition | Twist Administration';

        $usesCKeditor = true;

        $scripts = array('faqs.js');

        return view ('backend.faqs.edit', compact('title', 'faqData', 'usesCKeditor', 'scripts'));
    } 

    public function registerFaq(Request $request) {

        $messages = [
            'page.required' => 'You must select a page',
            'question.required' => 'You must enter the question',
            'answer.required' => 'You must enter the answer'
        ];

        $validations = $request->validate([
            'page' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ], $messages);

        $page = $request->input('page');
        $question = $request->input('question');
        $answer = $request->input('answer');

        $faqsModel = new FaqsModel();
        $faqsModel->page = $page;
        $faqsModel->question = $question;
        $faqsModel->answer = $answer;
        $faqsModel->save();
        $faqId = $faqsModel->faq_id;

        return response()->json([
            'success' => true,
            'message' => 'Faq registered successfully',
            'faqId' => $faqId
        ]);
    }

    public function editFaq(Request $request, $faqId) {

        $messages = [
            'page.required' => 'You must select a page',
            'question.required' => 'You must enter the question',
            'answer.required' => 'You must enter the answer'
        ];

        $validations = $request->validate([
            'page' => 'required',
            'question' => 'required',
            'answer' => 'required'
        ], $messages);

        $page = $request->input('page');
        $question = $request->input('question');
        $answer = $request->input('answer');

        FaqsModel::where('faq_id', $faqId)->update([
            'page' => $page,
            'question' => $question,
            'answer' => $answer
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Faq edited successfully',
            'faqId' => $faqId
        ]);
    }

    public function deleteFaq($faqId) {

        $faqData = FaqsModel::where('faq_id', $faqId)->first();

        if (!$faqData) {
            return response()->json(['success' => false, 'message' => 'The faq ID is invalid or non-existent']);
        }

        FaqsModel::where('faq_id', $faqId)->delete();

        return response()->json(['success' => true, 'message' => 'The faq has been successfully deleted']);
    }

    public function updateFaqsPositions(Request $request) {
    	$faqsPositions = json_decode($request->input('faqsPositions'), true);

    	if (!empty($faqsPositions) && count($faqsPositions) > 0) {
    		foreach ($faqsPositions as $faq) {
    			FaqsModel::where([['page', $faq['page']], ['faq_id', $faq['id']]])->update(['order' => $faq['position']]);
    		}
    	}

    	return response()->json(['success' => true, 'message' => 'Faqs order edited successfully']);
    }
}
