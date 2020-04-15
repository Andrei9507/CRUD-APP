@extends('app')

@section('content')

    <div class="row justify-content-around">
        <div class="col-4">
            Categories
        </div>
        <div class="col-4">
            <button onclick="addCategory();" class="btn btn-primary btn-sm pull-right">Add Category</button>
        </div>
    </div>

    <hr>

    <div id="js_add_category">

    </div>

    <div class="row justify-content-center pb-3 pt-3 border text-center">
        <div  class="col-sm-6 ">
            Category
        </div>
        <div class="col-sm-6">
            Actions
        </div>
    </div>
    <div id="listing_categories"> 
        @foreach($categories as $category)
        
            @include('category.listingItem')
    
        @endforeach
    </div>

@endsection
