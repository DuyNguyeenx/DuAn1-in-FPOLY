<?php 
function create_user($full_name,$phone,$email,$pass) {
    request_login(false);
    $id = db_insert('users', [
        'full_name' => $full_name,
        'phone' => $phone,
        'email' => $email,
        'pass' => $pass
    ]);
    return $id;
}

function get_list_users(){
        $result = db_fetch_array("SELECT * FROM `users`");
        return $result;
}
