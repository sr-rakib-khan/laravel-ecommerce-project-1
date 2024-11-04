<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body>
    <h3>Successfully order placed</h3>
    <strong>Order Id:{{$order['order_id']}}</strong><br>
    <strong>Order Date:{{$order['date']}}</strong><br>
    <strong>Total Amount:{{$order['total']}}</strong><br>
    <hr>
    <strong>Name:{{$order['c_name']}}</strong><br>
    <strong>Phone:{{$order['c_phone']}}</strong><br>
    <strong>Address:{{$order['c_shipping_address']}}</strong>
</body>

</html>