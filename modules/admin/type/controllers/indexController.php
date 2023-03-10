<?php

function construct()
{
    request_auth();
    load_model('index');
}

function indexAction()
{
    $data['types'] = get_list_types();
    load_view('index', $data);
}

function createAction()
{
    load_view('create');
}

function createPostAction()
{
    $name = $_POST['name'];
    if (empty($name)) {
        push_notification('danger', ['Vui lòng nhập vào tên loại']);
        header('Location: ?role=admin&mod=type&action=create');
        die();
    }
    create_types($name);
    push_notification('success', ['Tạo mới loại sản phẩm thành công']);
    header('Location: ?role=admin&mod=type');
    die;
}

function deleteAction()
{
    $id = $_GET['id_type'];
    delete_types($id);
    push_notification('success', ['Xoá loại sản phẩm thành công']);
    header('Location: ?role=admin&mod=type');
    die;
}

function updateAction()
{
    $id = $_GET['id_type'];
    $type = get_one_types($id);
    $data['types'] = $type;
    if ($type) {
        load_view('update', $data);
    } else {
        header('Location: ?role=admin&mod=type');
        die;
    }
}

function updatePostAction()
{
    $id = $_GET['id_type'];
    $type = get_one_types($id);
    if (!$type) {
        header('Location: ?role=admin&mod=type');
        die();
    }
    $name = $_POST['name'];
    $description = $_POST['description'];
    if (empty($name)) {
        push_notification('danger', [
            'name' => 'Vui lòng nhập vào tên loại'
        ]);
        header('Location: ?role=admin&mod=type&action=update&id_type=' . $id);
        die;
    }
    update_types($id, $name);
    push_notification('success', ['Chỉnh sửa loại sản phẩm thành công']);
    header('Location: ?role=admin&mod=type');
    die;
}
