<?php
function get_list_bills()
{
    $result = db_fetch_array("SELECT b.*,u.full_name FROM `bills` b  join `users` u on u.id = b.id_user");
    return $result;
}
function get_list_bills_detail($id)
{
    $result = db_fetch_array("SELECT b.*,bill_detail.quantity,bill_detail.price_total as total , p.title , p.images , bill_detail.price,bill_detail.id_products  FROM `bills` b join `users` on `users`.id = b.id_user join `bill_detail` on b.id = `bill_detail`.id_bill join products p on bill_detail.id_products = p.id where b.id = $id");
    return $result;
}

function get_one_bills($id)
{
    $result = db_fetch_row("SELECT * FROM `bills` WHERE `id` = '$id'");
    return $result;
}

function delete_bills($id)
{
    db_delete('bills', "id = $id");
    return true;
}
function update_status($id, $status)
{
    db_update('bills', [
        'status' => $status,
    ], "id = $id");
    return true;
}
// update bills set status = 3 where id = 9
function get_one_product($id)
{
    $result = db_fetch_row("SELECT * FROM `products` WHERE `id` = '$id'");
    return $result;
}
function update_quantity_sold_pro($id, $quantity,$sold)
{
    db_update('products', [
        'quantity' =>  $quantity,
        'sold' =>  $sold,
    ], "id=$id");
}
