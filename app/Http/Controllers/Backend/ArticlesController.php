<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;
use App\Models\ArticlesModel;
use App\Models\ArticleFaqsModel;

class ArticlesController extends Controller {
    public function list(Request $request) {
        $title = 'Articles | List | Twist Administration';
        
        $query = ArticlesModel::query();
        
        // Apply search filter
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }
        
        // Apply date filters
        if ($request->filled('date_from')) {
            $query->where('publish_date', '>=', $request->input('date_from'));
        }
        
        if ($request->filled('date_to')) {
            $query->where('publish_date', '<=', $request->input('date_to'));
        }
        
        // Apply status filter
        if ($request->filled('status')) {
            if ($request->input('status') == 'paused') {
                $query->where('paused', 1);
            } elseif ($request->input('status') == 'active') {
                $query->where('paused', 0);
            }
        }
        
        $articles = $query->orderBy('article_id', 'desc')->paginate(10);
        $totalArticles = ArticlesModel::count();
        
        $filtersParameters = [
            'search' => $request->input('search'),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
            'status' => $request->input('status'),
        ];
        $scripts = array('articles.js');
        return view('backend.articles.list', compact('title', 'articles', 'totalArticles', 'filtersParameters', 'scripts'));
    }
    public function register() {
        $title = 'Articles | Registration | Twist Administration';
        $scripts = array('articles-registration.js');
        return view('backend.articles.register', compact('title', 'scripts'));
    }
    public function edit($articleId) {
        $title = 'Articles | Edit | Twist Administration';
        $articleData = ArticlesModel::where('article_id', $articleId)->first();
        
        if (!$articleData) {
            return redirect()->route('articles-list')->with('error', 'Article not found');
        }
        
        // Load existing FAQs for this article
        $articleFaqs = ArticleFaqsModel::where('article_id', $articleId)->get();
        
        $scripts = array('articles-edition.js');
        return view('backend.articles.edit', compact('title', 'articleData', 'articleFaqs', 'scripts'));
    }
    public function registerArticle(Request $request) {
        $title = 'Articles | Registration | Twist Administration';
        $messages = [
            'title.required' => 'You must enter the title',
            'excerpt.required' => 'You must enter the excerpt',
            'body.required' => 'You must enter the body',
            'meta_title.required' => 'You must enter the meta title',
            'meta_description.required' => 'You must enter the meta description',
            'url_slug.required' => 'You must enter the url slug',
            'image.required' => 'You must upload an image',
        ];

        $validations = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,webp|max:5120',
        ], $messages);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('backend/images/articles'), $imageName);


        $article = new ArticlesModel();
        $article->title = $request->input('title');
        $article->excerpt = $request->input('excerpt');
        $article->body = $request->input('body');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        $article->url_slug = $request->input('url_slug');
        // Handle publish date
        $publishDate = $request->input('publish_date');
        if ($publishDate) {
            $article->publish_date = $publishDate;
        } else {
            $article->publish_date = now()->format('Y-m-d');
        }
        $article->image = $imageName;
    
        $article->save();

        $articleId = $article->article_id;



        $articleFaqs = $request->input('faqs');
        if ($articleFaqs) {
            $articleFaqs = json_decode($articleFaqs, true);
            foreach ($articleFaqs as $faqData) {
                $articleFaq = new ArticleFaqsModel();
                $articleFaq->title = $faqData['title'];
                $articleFaq->description = $faqData['description'];
                $articleFaq->article_id = $articleId;
                $articleFaq->save();
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Article registered successfully',
            'article_id' => $articleId
        ]);
    }
    public function editArticle(Request $request, $articleId) {
        $title = 'Articles | Edit | Twist Administration';
        $articleData = ArticlesModel::where('article_id', $articleId)->first();
        if (!$articleData) {
            return response()->json(['success' => false, 'message' => 'Article not found']);
        }

        // Handle publish date
        $publishDate = $request->input('publish_date');

        if (!$publishDate) {
            $publishDate = now()->format('Y-m-d');
        }

        // Update article fields
        $articleData->update([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'), 
            'body' => $request->input('body'),
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
            'url_slug' => $request->input('url_slug'),
            'publish_date' => $publishDate
        ]);

        // Handle image if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/images/articles'), $imageName);
            $articleData->image = $imageName;
            $articleData->save();
        }

        // Delete all existing FAQs for this article
        ArticleFaqsModel::where('article_id', $articleId)->delete();

        // Create new FAQs if provided
        $articleFaqs = $request->input('faqs');
        if ($articleFaqs) {
            $articleFaqs = json_decode($articleFaqs, true);
            foreach ($articleFaqs as $faq) {
                ArticleFaqsModel::create([
                    'title' => $faq['title'],
                    'description' => $faq['description'],
                    'article_id' => $articleId
                ]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => 'Article edited successfully',
            'article_id' => $articleId
        ]);
    }
    public function deleteArticle($articleId) {
        $articleData = ArticlesModel::where('article_id', $articleId)->first();
        if (!$articleData) {
            return response()->json(['success' => false, 'message' => 'Article not found']);
        }
        $articleData->delete();
        return response()->json(['success' => true, 'message' => 'Article deleted successfully']);
    }
    public function pauseArticle($articleId) {
        $article = ArticlesModel::where('article_id', $articleId)->first();
        if ($article) {
            $article->paused = 1;
            $article->save();
            return response()->json(['success' => true, 'message' => 'Article paused successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Article not found']);
    }
    public function resumeArticle($articleId) {
        $article = ArticlesModel::where('article_id', $articleId)->first();
        if ($article) {
            $article->paused = 0; 
            $article->save();
            return response()->json(['success' => true, 'message' => 'Article resumed successfully']);
        }
        return response()->json(['success' => false, 'message' => 'Article not found']);
    }

    public function checkUrlSlug(Request $request) {
        
        $urlSlug = '/' . $request->input('url_slug');

        $article = ArticlesModel::where('url_slug', $urlSlug)->first();

        return response()->json(['exists' => $article ? true : false]);
    }
}
