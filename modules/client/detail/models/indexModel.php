<?php
function get_one_product($id)
{
  $result = db_fetch_row("SELECT p.* ,c.name,b.name as b_name FROM products p JOIN categories c ON p.category_id = c.id join brands b on b.id = p.brand_id where p.id = $id");
  return $result;
}
function get_types_by_product($id)
{
  $result = db_fetch_array("SELECT ts.*,types.name FROM type_products ts join types on types.id = id_type where id_products = $id");
  return $result;
}
function get_list_comments_by_product_id($product_id)
{
  return db_fetch_array("SELECT
  u.full_name,
  u.image,
  cmt.description,
  cmt.created_at
FROM comments cmt
  JOIN users u ON cmt.id_user = u.id WHERE id_pro = $product_id");
}
function get_list_products_by_category($cate_id)
{
  return db_fetch_array("SELECT * FROM products p WHERE p.category_id = $cate_id");
}
function create_comment($desc, $user_id, $pro_id)
{
  $id = db_insert('comments', [
    'description' => $desc,
    'id_user' => $user_id,
    'id_pro' => $pro_id,
  ]);
  return $id;
}
function increment_view($view, $id_pro)
{
  db_update('products', [
    'view' => $view,
  ], "id =$id_pro");
}
function get_count_pro_by_cate_id($cate_id)
{
  $result = db_fetch_row("select count(id) as total from products where category_id = $cate_id");
  return  $result;
}
function get_qty_product($id)
{
  $result = db_fetch_row("SELECT quantity FROM products where id = $id");
  return $result;
}
function update_cart($qty, $key)
{
  $_SESSION['cart'][$key]['quantity'] = $qty;
  $_SESSION['cart'][$key]['total_price'] = $qty * $_SESSION['cart'][$key]['price'];
}
