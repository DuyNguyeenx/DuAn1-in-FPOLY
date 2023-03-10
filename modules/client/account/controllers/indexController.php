<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    request_login(true);
    $data['notifications'] = get_notification();
    $data['user'] = get_login();
    load_view('index', $data);
}
function indexPostAction()
{
    $user = get_login();
    $full_name = $_POST['full_name'];
    $email = $user['email'];
    $phone = $_POST['phone'];
    $image = $_FILES['image'];
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    if ($image_size == 0) {
        $image_name = $user['image'];
    }
    if (empty($full_name) || empty($phone)) {
        push_notification('red', ['Vui lòng nhập đầy đủ thông tin !!']);
        header('Location: ?role=client&mod=account');
        die;
    }
    update_user($user['id'], $full_name, $email, $phone, $image_name);
    move_uploaded_file($image['tmp_name'], 'public/images/' . $image_name);
    $cj = get_user_by_id($user['id']);
    push_login($cj);
    push_notification('green', ['Thay đổi thành công !!']);
    header('Location: ?role=client&mod=account');
}
