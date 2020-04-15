<div class="row justify-content-center pb-3 pt-3 border text-center" id="listing_product_{{$product->id}}">
    <div  class="col-sm-3">
        {{$product->name}}
    </div>
    <div  class="col-sm-3">
        {{$product->quantity}}
    </div>
    <div  class="col-sm-3">
        {{$product->category->name}}
    </div>
    <div class="col-sm-3" >
        <button class="btn btn-info btn-sm" onclick="editProduct({{$product->id}})">
            Edit
        </button>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#productModal" data-id="{{$product->id }}">
            Delete
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete product {{$product->name}} ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <form action="{{ route(('products.destroy'), $product->id) }}" method="post" style="display:inline;">
                      {{csrf_field()}}
                      {{ method_field('DELETE') }}				
                      <button class="btn btn-danger btn-sm" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
