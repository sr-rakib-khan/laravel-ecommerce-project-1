<form action="{{route('admin.order.update')}}" method="Post" enctype="multipart/form-data" id="order-update">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Customer Name</label>
                    <input type="text" name="name" class="form-control" value="{{$order->c_name}}">
                    <input type="hidden" name="id" class="form-control" value="{{$order->id}}">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Address</label>
                <input type="text" name="address" value="{{$order->c_shipping_address}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Phone</label>
                <input type="text" name="phone" value="{{$order->c_phone}}" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <select name="status" class="form-select" aria-label=".form-select-sm example">
                    <option value="0" @if($order->status == 0) selected @endif>Pending</option>
                    <option value="1" @if($order->status == 1) selected @endif>Received</option>
                    <option value="2" @if($order->status == 2) selected @endif>Shipped</option>
                    <option value="3" @if($order->status == 3) selected @endif>Completed</option>
                    <option value="4" @if($order->status == 4) selected @endif>Return</option>
                    <option value="5" @if($order->status == 5) selected @endif>Cancled</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>