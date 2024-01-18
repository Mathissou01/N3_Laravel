<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Unit;
use App\Models\Category;
use App\Http\Requests\StoreArticlesRequest;
use App\Http\Requests\UpdateArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $row = (int) request('row', 10);

        if ($row < 1 || $row > 100) {
            abort(400, 'The per-page parameter must be an integer between 1 and 100.');
        }

        $articles = Articles::with(['category', 'unit'])             
                ->sortable()
                ->paginate($row)
                ->appends(request()->query());

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

     public function create()
    {
        return view('articles.create', [
            'categories' => Category::all(),
            'units' => Unit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorearticlesRequest $request)
    {
        $articles = Articles::create($request->all());

        /**
         * Handle upload image
         */
        if($request->hasFile('articles_image')){
            $file = $request->file('articles_image');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            $file->storeAs('articless/', $filename, 'public');
            $articles->update([
                'articles_image' => $filename
            ]);
        }

        return redirect()
            ->route('articless.index')
            ->with('success', 'articles has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Articles $articles)
    {
      
        return view('articless.show', [
            'articles' => $articles,
         
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $articles)
    {
        return view('articless.edit', [
            'categories' => Category::all(),
            'units' => Unit::all(),
            'articles' => $articles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatearticlesRequest $request, Articles $articles)
    {
        $articles->update($request->except('articles_image'));

        /**
         * Handle upload an image
         */
        if($request->hasFile('articles_image')){

            // Delete Old Photo
            if($articles->articles_image){
                unlink(public_path('storage/articless/') . $articles->articles_image);
            }

            // Prepare New Photo
            $file = $request->file('articles_image');
            $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();

            // Store an image to Storage
            $file->storeAs('articless/', $fileName, 'public');

            // Save DB
            $articles->update([
                'articles_image' => $fileName
            ]);
        }

        return redirect()
            ->route('articless.index')
            ->with('success', 'articles has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $articles)
    {
        /**
         * Delete photo if exists.
         */
        if($articles->articles_image){
            unlink(public_path('storage/articless/') . $articles->articles_image);
        }

        $articles->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'articles has been deleted!');
    }
}
