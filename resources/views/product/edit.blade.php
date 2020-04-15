
<form class="row justify-content-center pb-3 pt-3 border text-center" id="edit_product_{{$product->id}}"> 

    <div  class="col-sm-3 text-center ">
        <input name="name" type="text" value=" {{$product->name}}" id="name_{{$product->id}}" onkeydown="removeWarningForName({{$product->id}})">
        <span id="check-name_{{$product->id}}" class="row justify-content-center text-danger"></span>
    </div>

    <div  class="col-sm-3 text-center ">
        <input name="quantity" type="text" value="{{$product->quantity}}" id="quantity_{{$product->id}}" onkeydown="removeWarningForProductQuantity({{$product->id}})">
        <span id="check-quantity_{{$product->id}}" class="row justify-content-center text-danger"></span>
    </div>

    <div  class="col-sm-3 text-center ">

    <select name="category_id" id="category_id_{{$product->id}}" onchange="removeWarningForProductCategory({{$product->id}})">
        @foreach($categories as $category)
     
            <option value="{{$category->id}}" 
            @if($category->id == $product->category_id) selected @endif > {{$category->name}}</option>
      
        @endforeach
    </select>
        <span id="check-category_id_{{$product->id}}" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-3">
        <button onclick="updateProduct({{$product->id}})" class="btn btn-success  btn-sm" type="button" >Update</button>
        <button  onclick="cancelEditProduct({{$product->id}})" type="button" class="btn btn-outline-secondary btn-sm" id="cancel-product"> Cancel</button>
    </div>

</form>