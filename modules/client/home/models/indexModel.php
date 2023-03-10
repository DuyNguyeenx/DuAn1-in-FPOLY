<?php
function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_one_product($id)
{
    $result = db_fetch_row("SELECT p.* ,c.name FROM products p JOIN categories c ON p.category_id = c.id where p.id = $id");
    return $result;
}

function get_list_products()
{
    $result = db_fetch_array("SELECT p.* ,c.name FROM products p JOIN categories c ON p.category_id = c.id");
    return $result;
}

function get_list_categories()
{
    $result = db_fetch_array("SELECT * from categories");
    return $result;
}
function get_list_brands()
{
    $result = db_fetch_array("SELECT * from brands");
    return $result;
}
function get_one_category($id)
{
    $result = db_fetch_row("SELECT * from categories WHERE id = $id");
    return $result;
}
function get_count_pro()
{
    $result = db_fetch_row("select count(id) as total from products");
    return  $result;
}
function get_limit_pro($start, $limit)
{
    $result = db_fetch_array("SELECT * FROM products LIMIT $start, $limit");
    return $result;
}
function get_top_3_pro()
{
    $result = db_fetch_array("SELECT * FROM products ORDER BY view DESC LIMIT 0,3");
    return $result;
}
// 