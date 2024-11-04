<div class="modal-body">
    <div class="card">
        <div class="card-body">
        </div>
        <h3>Product Details</h3>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Product Name:</strong> {{$order_details->product_name}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Color:</strong> {{$order_details->color}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Size:</strong> {{$order_details->size}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Quantity:</strong> {{$order_details->quantity}}</p>
            </div>
        </div>
        <hr>
        <h3>Delivery Details</h3>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Name:</strong> {{$order->c_name}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Phone:</strong> {{$order->c_phone}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Email:</strong> {{$order->c_email}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>Country:</strong> {{$order->c_country}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Shipping Address:</strong> {{$order->c_shipping_address}}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Zip Code:</strong> {{$order->c_zip_code}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <p><strong>City:</strong> {{$order->c_city}}</p>
            </div>
        </div>
        <hr>
        <h3>Amount Details</h3>
        <div class="row">
            <div class="col-md-3">
                <p><strong>Total:</strong> {{$order->total}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Subtotal:</strong> {{$order->subtotal}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Coupon Code:</strong> {{$order->coupon_code}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Coupon Discount:</strong> {{$order->coupon_discount}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p><strong>After Discount amount:</strong> {{$order->after_discount}}</p>
            </div>
            <div class="col-md-3">
                <p><strong>Payment Type:</strong> {{$order->payment_type}}</p>
            </div>
            <div class="col-md-3">
                @if($order->status == 0)
                <p><strong>Status:</strong> Order Pending</p>
                @elseif($order->status == 1)
                <p><strong>Status:</strong> Order Received</p>
                @elseif($order->status == 2)
                <p><strong>Status:</strong> Order Shipped</p>
                @elseif($order->status == 3)
                <p><strong>Status:</strong> Order Completed</p>
                @elseif($order->status == 4)
                <p><strong>Status:</strong> Order Return</p>
                @else
                <p><strong>Status:</strong> Order Cancled</p>
                @endif
            </div>
            <div class="col-md-3">
                <p><strong>Date:</strong> {{$order->date}}</p>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
</div>
</form>


<!-- <div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{$order->c_name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{$order->c_phone}}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{$order->c_email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Country</strong></td>
                        <td>{{$order->c_country}}</td>
                    </tr>
                    <tr>
                        <td><strong>Shipping Address</strong></td>
                        <td>{{$order->c_shipping_address}}</td>
                    </tr>
                    <tr>
                        <td><strong>Zip Code</strong></td>
                        <td>{{$order->c_zip_code}}</td>
                    </tr>
                    <tr>
                        <td><strong>City</strong></td>
                        <td>{{$order->c_city}}</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td>{{$order->total}}</td>
                    </tr>
                    <tr>
                        <td><strong>Sub Total</strong></td>
                        <td>{{$order->subtotal}}</td>
                    </tr>
                    <tr>
                        <td><strong>Coupon Code</strong></td>
                        <td>{{$order->coupon_code}}</td>
                    </tr>
                    <tr>
                        <td><strong>Coupon Discont</strong></td>
                        <td>{{$order->coupon_discount}}</td>
                    </tr>
                    <tr>
                        <td><strong>After Discount Amount</strong></td>
                        <td>{{$order->after_discount}}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Type</strong></td>
                        <td>{{$order->payment_type}}</td>
                    </tr>
                    <tr>
                        <td><strong>Order Status</strong></td>
                        @if($order->status == 0)
                        <td class="badge bg-danger">Order Pending</td>
                        @elseif($order->status == 1)
                        <td class="badge bg-success">Order Received</td>
                        @elseif($order->status == 2)
                        <td class="badge bg-primary">Order Shipped</td>
                        @elseif($order->status == 3)
                        <td class="badge bg-primary">Order Completed</td>
                        @elseif($order->status == 4)
                        <td class="badge bg-primary">Order Return</td>
                        @else($order->status == 5)
                        <td class="badge bg-danger">Order Cancled</td>
                        @endif
                    </tr>
                    <tr>
                        <td><strong>Date</strong></td>
                        <td>{{$order->date}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> -->