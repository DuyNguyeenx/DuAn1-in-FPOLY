<?php

function construct()
{
    request_auth();
    load_model('index');
    load('helper', 'format');
}

function indexAction()
{
    $data['products'] = get_list_products();
    load_view('index', $data);
}

function createAction()
{
    $data['categories'] = get_list_categories();
    $data['types'] = get_list_types();
    $data['brands'] = get_list_brands();
    load_view('create', $data);
}

function createPostAction()
{
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $type_id = $_POST['type_id'];
    $brand_id = $_POST['brand_id'];
    $thumb = $_FILES['thumb'];
    $thumb_name = $_FILES['thumb']['name'];
    if (empty($title) || empty($description)|| empty($count) || empty($price)|| empty($type_id) || empty($brand_id) || $thumb['size'] <=0 ) {
        push_notification('danger', ['Vui lòng Thêm đủ thông tin']);
        header('Location: ?role=admin&mod=product&action=create');
        die();
    }
    $t = time() . $thumb_name;
    $create_product = create_product($title, $category_id, $description, $count, $price, $t, $brand_id);
    foreach ($type_id as $types_id) {
        create_type($types_id, $create_product);
    }
    move_uploaded_file($thumb['tmp_name'], 'public/images/' . $t);
    push_notification('success', ['Tạo mới sản phẩm thành công']);
    header('Location: ?role=admin&mod=product');
    die;
}

function deleteAction()
{
    $id = $_GET['id_prod'];
    delete_product($id);
    push_notification('success', ['Xoá  sản phẩm thành công']);
    header('Location: ?role=admin&mod=product');
    die;
}

function updateAction()
{
    $id = $_GET['id_prod'];
    $prod = get_one_product($id);
    $data['categories'] = get_list_categories();
    $data['types'] = get_list_types();
    $data['brands'] = get_list_brands();
    $data['product'] = $prod;
    $data['list_types'] = get_one_types($id);
    if ($prod) {
        load_view('update', $data);
    } else {
        header('Location: ?role=admin&mod=product');
        die;
    }
}

function updatePostAction()
{
    $id_pro = $_GET['id_prod'];
    $prod = get_one_product($id_pro);
    if (!$prod) {
        header('Location: ?role=admin&mod=product');
        die();
    }
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $type_id = $_POST['type_id'];
    $brand_id = $_POST['brand_id'];
    $thumb = $_FILES['thumb'];
    $thumb_name = $_FILES['thumb']['name'];
    $previmg_name = $_POST['previmg'];
    if (empty($title)) {
        push_notification('errors', [
            'title' => 'Vui lòng nhập vào tiêu đề sản phẩm'
        ]);
        header('Location: ?role=admin&mod=product&action=update&id_prod=' . $id_pro);
        die;
    }
    $t = time() . $thumb_name;
    if ($thumb['size'] <= 0) {
        $t = $previmg_name;
    }
    update_product($id_pro, $title, $category_id, $description, $count, $price, $t, $brand_id);
    $type_prev = get_one_types($id_pro);
    foreach ($type_prev as $type) {
        delete_type($type['id']);
    }
    foreach ($type_id as $types_id) {
        create_type($types_id, $id_pro);
    }
    move_uploaded_file($thumb['tmp_name'], 'public/images/' . $t);
    push_notification('success', ['Chỉnh sửa danh mục sản phẩm thành công']);
    header('Location: ?role=admin&mod=product');
    die;
}
