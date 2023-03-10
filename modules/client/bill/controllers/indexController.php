<?php

function construct()
{
    request_login();
    load('helper', 'format');
    load_model('index');
}

function indexAction()
{
    $user = get_login();
    $user_id = $user['id'];
    $data['notifications'] = get_notification();
    $data['bills'] = get_bill_by_userId($user_id);

    load_view('index', $data);
}
function showAction()
{
    if (isset($_GET['bill_id']) && $_GET['bill_id'] != '') {
        $bill_id = $_GET['bill_id'];
        $data['bills'] = get_bill_detail($bill_id);
    }

    load_view('show', $data);
}
