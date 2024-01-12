<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsItemsRequest;
use App\Http\Requests\UpdateNewsItemsRequest;
use App\Models\NewsItem;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsItems = NewsItem::all();
        return view('news.index', compact('newsItems'));
    }

    /**
     * Display the specified news item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsItem = NewsItem::find($id);
        if ($newsItem) {
            return view('news.show', compact('newsItem'));
        } else {
            return redirect()->route('news.index')->with('error', 'News item not found');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsItemsRequest $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsItems $newsItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsItemsRequest $request, NewsItems $newsItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsItems $newsItems)
    {
        //
    }
}
