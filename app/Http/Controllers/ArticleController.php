<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM article_posts;
        $articles = Article::where('user_id', Auth::id())->get();;
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $Article = Article::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'title_fr' => $request->title_fr,
        //     'body_fr' => $request->body_fr,
        //     'user_id' => Auth::User()->id,
        //     'categories_id' => $request->categories_id
        // ]);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $Article = new Article;
        $Article->fill($request->all());
        $Article->user_id = Auth::User()->id;
        $Article->save();



        return redirect(route('article.forum', $Article->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $Article)
    {

        return view('article.show', ['Article' => $Article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $Article)
    {


        return view('article.edit', ['Article' => $Article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $Article)
    {
        $Article->update([
            'title' => $request->title,
            'body'  => $request->body,

        ]);

        return redirect(route('article.show', $Article->id))->withSuccess('Article mis à jour avec success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $Article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $Article)
    {
        $Article->delete();
        return redirect(route('article.index'));
    }

    public function query()
    {

        $article = Article::select('user_id', (DB::raw('count(*) as article')))
            ->groupBy('user_id')
            ->get();

        return $article;
    }

    public function page()
    {
        $articles = Article::select()
            ->paginate(5);
        return view('article.page', ['articles' => $articles]);
    }

    public function pdf(Article $Article)
    {

        $pdf = PDF::loadView('article.show-pdf', ['Article' => $Article]);
        return $pdf->download('article.pdf');
        //return $pdf->stream('article.pdf');
    }
    public function forum()
    {
        $articles = Article::select()
            ->paginate(5);
        return view('article.forum', ['articles' => $articles]);
    }
}