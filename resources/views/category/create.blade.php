<form class="row justify-content-center pb-3 pt-3 border text-center" id="add_category">
    <div  class="col-sm-6  text-center">
        <input name="name" type="text" placeholder="Category name" require autocomplete="off" id="name" onkeydown="removeWarningForName()" onkeyup="checkExistingCategory()" >
        <span id="check-name" class="row justify-content-center text-danger"></span>
        <span id="check-valid-name" class="row justify-content-center text-danger"></span>
    </div>
    <div class="col-sm-6">
        <button  onclick="storeCategory()" type="button" class="btn btn-success btn-sm"> Submit</button>
        <button  onclick="cancelCreateCategory()" type="button" class="btn btn-outline-secondary btn-sm" id="cancel-category"> Cancel</button>
    </div>
</form>