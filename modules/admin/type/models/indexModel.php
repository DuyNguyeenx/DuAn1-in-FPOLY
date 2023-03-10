<?php
function get_list_types() {
    $result = db_fetch_array("SELECT * FROM `types`");
    return $result;
}

function get_one_types($id) {
    $result = db_fetch_row("SELECT * FROM `types` WHERE `id` = '$id'");
    return $result;
}

function create_types($name) {
    $user = get_auth();
    $id = db_insert('types', [
        'name' => $name,
    ]);
    return $id;
}

function update_types($id, $name) {
    db_update('types', [
        'name' => $name,
    ], "id = $id");
    return true;
}

function delete_types($id) {
    db_delete('types', "id = $id");
    return true;
}