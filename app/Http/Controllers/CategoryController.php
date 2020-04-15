<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $category;


    public function __construct(
        Category $category
    )
    {

        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getAll();
        // dd($categories);

        return view('category/listing')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
        ]);
        $category = $this->category->saveItem($request->all());

        return view('category.listingItem')->withCategory($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category/edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' =>'required',
        ]);
        
        $category = $this->category->find($category->id);
        $category->update($request->all());
        
        return view('category.listingItem')->withCategory($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->find($id)->delete();
        
        return back();
    }

    public function cancelEditCategory($id)
    {
        $category = $this->category->getItem($id);
        
        return view('category/listingItem')->withCategory($category);
    }

    public function checkExistingCategory($category)
    {
        $item = $this->category->getItemByName($category);
        
        if($item != null)
        {
            return 1;
        }
            return 0;
    }
}
