<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    $data['notifications'] = get_notification();
    load_view('index', $data);
}
