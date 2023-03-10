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
    $qty = $_POST['quantity'];
    foreach ($_SESSION['cart'] as $key => $item) {
        $id_pro = get_qty_product($_SESSION['cart'][$key]['id_pro']);
        if ($id_pro['quantity'] < $qty[$key]) {
            push_notification('red', ['Số lượng vượt quá giới hạn trong kho']);
            header("Location: ?mod=cart");
            die;
        }
    }
    update_cart($qty);
    push_notification('green', ['Sửa thành công']);
    header("Location: ?mod=cart");
    die;
}
function deleteAction()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        array_splice($_SESSION['cart'], $id, 1);
    } else {
        $_SESSION['cart'] = array();
    }
    push_notification('green', ['Xoá thành công']);
    header("Location: ?mod=cart");
    die;
}
