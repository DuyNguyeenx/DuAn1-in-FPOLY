<?php
function get_bill_by_userId($user_id)
{
  $result = db_fetch_array("SELECT * FROM bills WHERE id_user = $user_id order by id DESC");
  return $result;
}
function get_bill_detail($bill_id)
{
  $result = db_fetch_array("SELECT
  p.images,
  p.title,
  bt.type_name,
  bt.quantity,
  bt.price,
  bt.price_total,
  b.name as b_name
FROM bill_detail bt
  JOIN products p ON p.id = bt.id_products
  JOIN brands b ON b.id = p.brand_id
WHERE id_bill = $bill_id");
  return $result;
}
