@extends('app')

@section('content')

<div class="row justify-content-around">
    <div class="col-4">
        Products
    </div>
    <div class="col-4">
        <button onclick="addProduct();" class="btn btn-primary btn-sm pull-right">Add Product</button>
    </div>
  </div>

<hr>

<div id="js_add_product">

</div>

<div class="row justify-content-center pb-3 pt-3 border text-center">
    <div  class="col-sm-3">
        Product
    </div>
    <div  class="col-sm-3">
        Quantity
    </div>
    <div  class="col-sm-3">
        Category
    </div>
    <div class="col-sm-3">
        Actions
        
    </div>
</div>
<div id="listing_products"> 
    @foreach($products as $product)
       
       @include('product.listingItem')
   
   @endforeach
</div>

@endsection
