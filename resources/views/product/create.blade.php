<form class="row justify-content-center pb-3 pt-3 border text-center" id="add_product">
    
    <div  class="col-sm-3  text-center ">
        <input name="name" type="text" placeholder="Name" require autocomplete="off" id="name" onkeydown="removeWarningForName()" >
        <span id="check-name" class="row justify-content-center text-danger"></span>
    </div>

    <div  class="col-sm-3  text-center ">
        <input name="quantity" type="number" placeholder="Quantity" require autocomplete="off" id="quantity" onkeydown="removeWarningForProductQuantity()" >
        <span id="check-quantity" class="row justify-content-center text-danger"></span>
    </div>
    
    <div class="col-sm-3  text-center">
        <select name="category_id" id="category_id" onchange="removeWarningForProductCategory()" >
            <option value="">Select category</option>
            @foreach($categories as $category)
            {
                <option value="{{$category->id}}">{{$category->name}}</option>
            }
            @endforeach
        </select>
        
        <span id="check-category_id" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-3">
        <button  onclick="storeProduct()" type="button" class="btn btn-success btn-sm"> Submit</button>
        <button  onclick="cancelCreateProduct()" type="button" class="btn btn-outline-secondary btn-sm" id="cancel-product"> Cancel</button>
    </div>
</form>