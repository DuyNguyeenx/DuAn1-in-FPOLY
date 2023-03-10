<?php

function get_list_products()
{
    $result = db_fetch_array("SELECT p.* ,c.name FROM products p JOIN categories c ON p.category_id = c.id");
    return $result;
}
function get_list_categories()
{
    $result = db_fetch_array("SELECT c.id, c.name, c.description, c.create_id, c.created_at, u.full_name, u.id as `uid` FROM `categories` c JOIN `users` u ON c.create_id = u.id");
    return $result;
}

function get_one_category($id)
{
    $result = db_fetch_row("SELECT c.id, c.name, c.description, c.create_id, c.created_at, u.full_name, u.id as `uid` FROM `categories` c JOIN `users` u ON c.create_id = u.id WHERE c.id = $id");
    return $result;
}
function get_count_pro_by_value($value)
{
    $result = db_fetch_row("select count(id) as total from products where title LIKE '%$value%'");
    return  $result;
}
function get_limit_pro_by_value($start, $limit, $value)
{

    $result = db_fetch_array("SELECT * FROM products where title LIKE '%$value%'  LIMIT $start, $limit");
    return $result;
}
function get_count_pro_by_cate_id($cate_id)
{
    $result = db_fetch_row("select count(id) as total from products where category_id = $cate_id");
    return  $result;
}
function get_limit_pro_by_cate_id($start, $limit, $cate_id)
{

    $result = db_fetch_array("SELECT * FROM products where category_id = $cate_id  LIMIT $start, $limit");
    return $result;
}
function get_count_pro_by_brand_id($brand_id)
{
    $result = db_fetch_row("select count(id) as total from products where brand_id = $brand_id");
    return  $result;
}
function get_limit_pro_by_brand_id($start, $limit, $brand_id)
{

    $result = db_fetch_array("SELECT * FROM products where brand_id = $brand_id  LIMIT $start, $limit");
    return $result;
}
