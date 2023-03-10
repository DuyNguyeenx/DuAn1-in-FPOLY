<?php
function get_list_products()
{
    $result = db_fetch_array("SELECT p.* ,c.name FROM products p JOIN categories c ON p.category_id = c.id ");
    return $result;
}

function get_one_product($id)
{
    $result = db_fetch_row("SELECT p.*  FROM products p where p.id = $id");
    return $result;
}

function create_product($title, $category_id, $description, $count, $price, $thumb, $brand_id)
{
    $user = get_auth();
    $id = db_insert('products', [
        'title' => $title,
        'category_id' => $category_id,
        'description' => $description,
        'quantity' => $count,
        'images' =>  $thumb,
        'price' => $price,
        'brand_id' => $brand_id,
    ]);
    return $id;
}

function update_product($id, $title, $category_id, $description, $count, $price, $thumb, $brand_id)
{
    db_update('products', [
        'title' => $title,
        'category_id' => $category_id,
        'description' => $description,
        'quantity' => $count,
        'images' =>  $thumb,
        'price' => $price,
        'brand_id' => $brand_id,
    ], "id = $id");
    return true;
}

function delete_product($id)
{
    db_delete('products', "id = $id");
    return true;
}

function get_list_categories()
{
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}
function get_list_types()
{
    $result = db_fetch_array("SELECT * FROM `types`");
    return $result;
}
function get_one_types($id)
{
    $result = db_fetch_array("SELECT * FROM type_products  where id_products = $id");
    return $result;
}
function get_list_brands()
{
    $result = db_fetch_array("SELECT * FROM `brands`");
    return $result;
}
function create_type($type_id, $prod_id)
{
    $id = db_insert('type_products', [
        'id_type' => $type_id,
        'id_products' => $prod_id,
    ]);
    return $id;
}
function update_type($id, $type_id, $prod_id)
{
    db_update('type_products', [
        'id_type' => $type_id,
        'id_products' => $prod_id,
    ], "id = $id");
    return true;
}
function delete_type($id)
{
    db_delete('type_products', "id = $id");
    return true;
}
