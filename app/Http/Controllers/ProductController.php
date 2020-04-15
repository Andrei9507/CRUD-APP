<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    protected $product;

    public function __construct(
        Product $product,
        Category $category
    )
    {

        $this->product = $product;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->getAll();

        return view('product/listing')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getAll();
        
        return view('product/create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name' =>'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);

        $product = $this->product->saveItem($request->all());

        return view('product.listingItem')->withProduct($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->category->getAll();
        
        return view('product/edit') ->withProduct($product)
                                    ->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name' =>'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);

        $product = $this->product->find($product->id);
        $product->update($request->all());
        
        return view('product.listingItem')->withProduct($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();
        
        return back();
    }

    public function cancelEditProduct($id)
    {
        $product = $this->product->getItem($id);
        
        return view('product/listingItem')->withProduct($product);
    }

    
}
