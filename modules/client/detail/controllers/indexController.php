<?php

function construct()
{
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    if (!$_GET['id']) {
        header('Location: ?mod=not_found');
        die;
    }
    $id = $_GET['id'];
    $product = get_one_product($id);
    increment_view($product['view'] + 1, $id);
    $data['types'] = get_types_by_product($id);
    $data['comments'] = get_list_comments_by_product_id($id);

    $data['same_product'] = get_list_products_by_category($product['category_id']);
    $data['product'] = $product;
    if (is_login()) {
        $data['user'] = get_login();
    }
    $data['notifications'] = get_notification();
    load_view('index', $data);
}
function indexPostAction()
{
    $id_pro = $_GET['id'];
    if (isset($_POST['up_comment'])) {
        request_login(true);
        $desc = $_POST['desc'];
        if (is_login()) {
            $user = get_login();
        }
        if (empty($desc)) {
            push_notification('red', ['Vui lòng nhập']);
            header('Location: ?mod=detail&id=' . $id_pro);
            die();
        }
        create_comment($desc, $user['id'], $id_pro);
        push_notification('green', ['Thành công']);
        header('Location: ?mod=detail&id=' . $id_pro);
        die;
    }
    if (isset($_POST['add_cart'])) {
        $image = $_POST['image'];
        $title = $_POST['title'];
        $brand = $_POST['brand'];
        $brand_ar = explode("|", $brand);
        $brand_id = $brand_ar[0];
        $brand_name = $brand_ar[1];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        if (!$_POST['type']) {
            push_notification('red', ['bạn cần chọn loại cho sản phẩm này']);
            header("Location: ?mod=detail&id=$id_pro");
            die;
        }
        $type = $_POST['type'];
        $type_ar = explode("|", $type);
        $type_id = $type_ar[0];
        $type_name = $type_ar[1];
        $total_price = $price * $quantity;
        $quantity_pro = get_qty_product($id_pro);
        if ($quantity_pro['quantity'] < $quantity) {
            push_notification('red', ['Vượt quá số lượng trong kho']);
            header("Location: ?mod=detail&id=$id_pro");
            die;
        }
        if (!is_ss('cart')) {
            push_ss('cart', []);
        }

        array_push(
            $_SESSION['cart'],
            [
                'image' => $image,
                'title' => $title,
                'quantity' => $quantity,
                'price' => $price,
                'total_price' => $total_price,
                'brand_id' =>  $brand_id,
                'brand_name' =>  $brand_name,
                'type_id' =>  $type_id,
                'type_name' =>  $type_name,
                'id_pro' =>  $id_pro
            ]
        );

        push_notification('green', ['Thêm sản phẩm vào giỏ hàng thành công']);
        header("Location: ?mod=detail&id=$id_pro");
        die;
    }
}
