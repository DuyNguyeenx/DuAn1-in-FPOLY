<?php
function get_list_comments() {
    $result = db_fetch_array("SELECT c.*, users.full_name , users.image , users.role , p.title FROM `comments` c join products p on c.id_pro = p.id join users on users.id = c.id_user ");
    return $result;
}
function delete_comments($id) {
    db_delete('comments', "id = $id");
    return true;
}