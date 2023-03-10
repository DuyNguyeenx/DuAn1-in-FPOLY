<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    request_login(true);
    if (!is_ss('cart')) {
        push_ss('cart', []);
    }
    $data['notifications'] = get_notification();
    $data['products'] = get_ss('cart');
    load_view('index', $data);
}
function indexPostAction()
{
    $user = get_login();
    $id_user = $user['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $price_total = $_POST['price_total'];
    $carts = get_ss('cart');

    if (empty($name) || empty($phone) || empty($address)) {
        push_notification('red', ['Vui lòng nhập đủ thông tin']);
        header('Location: ?role=client&mod=pay');
        die;
    }
    $bill_id = create_bill($price_total, $name, $phone, $address, $id_user);

    foreach ($carts as $key => $cart) {
        // [$image, $title, $quantity, $price, $total_price, $brand_id, $brand_name, $type_id, $type_name, $id_pro]
        // [
        // 'image' => $image,0
        // 'title' => $title,1
        // 'quantity' => $quantity,2
        // 'price' => $price,3
        // 'total_price' => $total_price,4
        // 'brand_id' => $brand_id,5
        // 'brand_name' => $brand_name,6
        // 'type_id' => $type_id,7
        // 'type_name' => $type_name,8
        // 'id_pro' => $id_pro 9
        // ]
        $id_products = $cart['id_pro'];
        $id_bill = $bill_id;
        $quantity = $cart['quantity'];
        $price_total = $cart['total_price'];
        $price = $cart['price'];
        $type_name = $cart['type_name'];
        create_bill_detail($id_products, $id_bill, $quantity, $price_total, $price, $type_name);
    }
    push_notification('green', ['Đặt hàng thành công']);
    unset($_SESSION['cart']);
    header('Location: ?role=client&mod=bill');
    die;
}
