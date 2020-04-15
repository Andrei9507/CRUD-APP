$( document ).ready(function() {

	$.ajaxSetup({
			headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });

});

/// -------------Category -----------

function addCategory()
{
    $.get('categories/create',{},function(data){

        $('#js_add_category').html(data).addClass("form-group");

    });
}

function storeCategory()
{
    var exist = $("#check-valid-name").text().length;

    if(exist == 0)
    {
        if(validationFieldForCategory()){
            var data = $("#add_category").serializeArray();

            $.post('categories', data, function (data) {
                
                $("#listing_categories").prepend(data);
                $("#add_category").remove();
            });
        }
    }
        
}

function cancelCreateCategory(){
    $("#add_category").remove();
}

function checkExistingCategory(){
    
    var category = $('#name').val();
    var i= 0;

    if(category != '')
    {
        $.get('checkExistingCategory/'+category,{},function(data){
            console.log(data);
    
            if(data == 1){
                console.log('here i am in if');
                $("#check-valid-name").text("");
                $("#check-valid-name").text("Category already exist");
                i++;
            }else{
                $("#check-valid-name").text("");
            }
    
            console.log(i);
            if (i != 0) {
                console.log('last if');
                return false;
            }
            if(i == 0){
                console.log('last if 2');
                return true;
            }
        });
    
    }
    
    
}


function editCategory(id)
{

    $.get('categories/'+id+'/edit',{},function(data){

        $('#listing_category_'+id).replaceWith(data);
        
    });
}

function cancelEditCategory(id){

    $.get('cancelEditCategory/'+id,{},function(data){

        $("#edit_category_"+id).replaceWith(data);

    });
}

function updateCategory(id)
{
    
    if(validationFieldForCategory(id))
    {
        var data = $("#edit_category_"+id).serializeArray();

        $.ajax({
            url: '/categories/' + id,
            type: 'PUT',
            data: data,
            success: function (result) {
                
                $("#edit_category_"+id).replaceWith(result);
            }

        });

    }
}

function validationFieldForCategory(id) {

   
    var i = 0;
    
    if(id){
        
        var name = $('#name_'+id).val();

        if (name == null || name == 0 || name == '') {
            $('#check-name_'+id).text("Name is required");
            i++;
        }

    }else{

        var name = $('#name').val();

        if (name == null || name == 0 || name == '') {
            $('#check-name').text("Name is required");
            i++;
        }
    }

    if (i != 0) {
        return false;
    }
    return true;
}

/// -------------Product -----------


function addProduct()
{
    $.get('products/create',{},function(data){

        $('#js_add_product').html(data).addClass("form-group");

    });
}

function storeProduct()
{
   if(validationFieldForProduct()){

        var data = $("#add_product").serializeArray();
        
        $.post('products', data, function (data) {
            
            $("#listing_products").prepend(data);
            $("#add_product").remove();
        });
   }

}

function cancelCreateProduct(){
    $("#add_product").remove();
}

function editProduct(id)
{

    $.get('products/'+id+'/edit',{},function(data){

        $('#listing_product_'+id).replaceWith(data);
        
    });
}

function cancelEditProduct(id){

    $.get('cancelEditProduct/'+id,{},function(data){

        $("#edit_product_"+id).replaceWith(data);

    });
}

function updateProduct(id)
{
    if(validationFieldForProduct(id))
    {
        var data = $("#edit_product_"+id).serializeArray();

        $.ajax({
            url: '/products/' + id,
            type: 'PUT',
            data: data,
            success: function (result) {
                
                $("#edit_product_"+id).replaceWith(result);
            }

        });

    }
        
}

function validationFieldForProduct(id) {

    var i = 0;

    if(id){
        
        var name = $('#name_'+id).val();
        var quantity = $('#quantity_'+id).val();
        var category = $('#category_id_'+id).val();

        if (name == null || name == 0 || name == '') {
            $('#check-name_'+id).text("Name is required");
            i++;
        }
    
        if (quantity == null || quantity == 0 || quantity == '') {
            $('#check-quantity_'+id).text("Quantity is required");
            i++;
        }
        
        if (category == null || category == 0 || category == '') {
            $('#check-category_id_'+id).text("Category is required");
            i++;
        }

    }else{

        var name = $('#name').val();
        var quantity = $('#quantity').val();
        var category = $('#category_id').val();

        if (name == null || name == 0 || name == '') {
            $('#check-name').text("Name is required");
            i++;
        }
    
        if (quantity == null || quantity == 0 || quantity == '') {
            $('#check-quantity').text("Quantity is required");
            i++;
        }
        
        if (category == null || category == 0 || category == '') {
            $('#check-category_id').text("Category is required");
            i++;
        }
    }
    
    if (i != 0) {
        return false;
    }
    return true;
}


function removeWarningForName(id){

    if ($("input[name$='name']")) {
        if(id){

            return $('#check-name_'+id).text("");

        }
        return $('#check-name').text("");
    }

}

function removeWarningForProductQuantity(id){

    if ($("input[name$='quantity']")) {
        if(id){

            return $('#check-quantity_'+id).text("");
        }
        return $('#check-quantity').text("");
    }
}

function removeWarningForProductCategory(id){

    if ($("input[name$='category_id']")) {
        if(id){

            return $('#check-category_id_'+id).text("");
        }
        return $('#check-category_id').text("");
    }
}

function editProduct(id)
{

    $.get('products/'+id+'/edit',{},function(data){

        $('#listing_product_'+id).replaceWith(data);
        
    });
}