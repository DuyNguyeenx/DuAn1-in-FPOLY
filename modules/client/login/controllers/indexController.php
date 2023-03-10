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
    request_login(false);
    // validation
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        push_notification('red', ['Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu']);
        header('Location: ?role=client&mod=login');
    }
    // xử lý đăng nhập
    $login = get_login_user($username, $password);
    if ($login) {
        push_login($login);
        header('Location: ?mod=home');
    }else {
        push_notification('red', ['Tài khoản hoặc mật khẩu không chính xác']);
        header('Location: ?role=client&mod=login');
    }
}

function logoutAction()
{
    request_login();
    remove_login();
    header("Location: ?role=client&mod=login");
}
