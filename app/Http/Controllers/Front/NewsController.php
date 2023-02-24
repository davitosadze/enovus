<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('front.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create([
            "title" => $request->get('title'),
            "description" => $request->get('post_description')
        ]);

        if ($request->hasFile("image")) {
            $path = $request->image->store('news-images', 'public');
            $image_name = $request->image->hashName();
            $news->image = url('/') . "/storage/news-images/" . $image_name;
            $news->save();
        }

        return redirect('/news')->with('success', 'News successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('front.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news->title = $request->get('title');
        $news->description = $request->get('post_description');

        if ($request->hasFile("image")) {
            $path = $request->image->store('news-images', 'public');
            $image_name = $request->image->hashName();
            $news->image = url('/') . "/storage/news-images/" . $image_name;
            $news->save();
        }

        $news->save();

        return redirect('/news')->with('success', 'News successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back()->with('success', 'Blog post successfully deleted');
    }
}
