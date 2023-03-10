<?php
function get_list_brands() {
    $result = db_fetch_array("SELECT * FROM `brands`");
    return $result;
}

function get_one_brands($id) {
    $result = db_fetch_row("SELECT * FROM `brands` WHERE `id` = '$id'");
    return $result;
}

function create_brands($name,$image) {
    $user = get_auth();
    $id = db_insert('brands', [
        'name' => $name,
        'image' => $image,
    ]);
    return $id;
}

function update_brands($id, $name,$image) {
    db_update('brands', [
        'name' => $name,
        'image' => $image,
    ], "id = $id");
    return true;
}

function delete_brands($id) {
    db_delete('brands', "id = $id");
    return true;
}