<?php
function update_user($id, $full_name, $email, $phone, $image)
{
    db_update('users', [
        'full_name' => $full_name,
        'email' => $email,
        'phone' => $phone,
        'image' => $image
    ], "id = $id");
    return true;
}


function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `users` WHERE `id` = {$id}");
    return $item;
}