<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    request_login(false);
    $notifications = get_notification();
    load_view('index', [
        "notifications" => $notifications
    ]);
}
function indexPostAction()
{
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $re_pass = $_POST['re_pass'];
    if (empty($full_name) || empty($phone) || empty($email) || empty($pass) || empty($re_pass)) {
        push_notification('red', ['Vui lòng nhập đầy đủ thông tin']);
        header('Location: ?mod=register');
        die;
    }
    $users = get_list_users();
    foreach ($users as $user) {
        if ($email == $user['email']) {
            push_notification('red', ['Email đã tồn tại !!']);
            header('Location: ?mod=register');
            die();
        }
    }
    if ($re_pass != $pass) {
        push_notification('red', ['Nhập lại mật khẩu sai !!']);
        header('Location: ?mod=register');
        die();
    }
    create_user($full_name, $phone, $email, $pass);
    push_notification('green', ['Đăng ký thành công !!']);
    header('Location: ?mod=login');
}
