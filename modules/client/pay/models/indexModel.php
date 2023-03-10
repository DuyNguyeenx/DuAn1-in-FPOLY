<?php
function create_bill($price_total, $name_user, $phone, $address, $id_user)
{
  request_login(true);
  $id = db_insert('bills', [
    'price_total' => $price_total,
    'name_user' => $name_user,
    'phone' => $phone,
    'address' => $address,
    'id_user' => $id_user
  ]);
  return $id;
}
function create_bill_detail($id_products, $id_bill, $quantity, $price_total, $price, $type_name)
{
  request_login(true);
  $id = db_insert('bill_detail', [
    'id_products' => $id_products,
    'id_bill' => $id_bill,
    'quantity' => $quantity,
    'price_total' => $price_total,
    'price' => $price,
    'type_name' => $type_name,
  ]);
  return $id;
}
