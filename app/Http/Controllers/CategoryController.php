<?php

namespace App\Http\Controllers;

use App\Area;
use App\Category;
use App\Service;
use App\State;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withTrashed()->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function create(Area $area)
    {
        return view('admin.categories.create', compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Area $area)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $area->categories()->create($request->all());

        return redirect()->route('areas.show', $area)->with('flash', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return void
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Area $area
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area, Category $category)
    {
        return view('admin.categories.edit', compact('area', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Area $area
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $category->update($request->all());

        return redirect()->route('areas.show', $area)->with('flash', 'Categoría actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        $category->state_id = State::where('abbreviation', 'gen-del')->first()->id;
        $category->save();
        $category->delete();

        return redirect()->route('categories.index')->with('flash', 'Categoría eliminada correctamente');
    }
}
