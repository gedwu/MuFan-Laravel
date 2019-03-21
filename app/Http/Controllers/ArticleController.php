<?php

namespace App\Http\Controllers;

use App\Article;
use App\Test;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        @todo: testing

        $articles = Article::all();

        foreach ($articles as $key => $article) {
            $articles[$key]->time_ago =
                \Carbon\Carbon::parse($article->created_at)->diffForHumans();
        }

//        dump($articles->toArray());
        return view('articles.index', compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Article::create($attributes);

        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function saveClick(Request $request) {
        $clickObject = new Test;
        $clickObject->article_id = $request->input('article_id');
        $clickObject->ip = $request->input('ip_adress');
        $clickObject->country = $request->input('country_name');
        $clickObject->browser = $request->input('agent_info');

        $return = ['success' => 'Click was saved'];
        if($clickObject->save()) {
            return response()->json($return);
        }
    }
}
