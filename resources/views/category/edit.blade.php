<form class="row justify-content-center pb-3 pt-3 border text-center" id="edit_category_{{$category->id}}"> 
    <div  class="col-sm-6 text-center ">
        <input name="name" type="text" value="{{$category->name}}" id="name_{{$category->id}}" onkeydown="removeWarningForName({{$category->id}})">
        <span id="check-name_{{$category->id}}" class="row justify-content-center text-danger"></span>
    </div>

    <div class="col-sm-6">
        <button onclick="updateCategory({{$category->id}})" class="btn btn-success  btn-sm" type="button" >Update</button>
        <button  onclick="cancelEditCategory({{$category->id}})" type="button" class="btn btn-outline-secondary btn-sm" id="cancel-category"> Cancel</button>
    </div>

</form>