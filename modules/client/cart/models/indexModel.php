<?php

function update_cart($qty)
{
  foreach ($_SESSION['cart'] as $key => $item) {
    $_SESSION['cart'][$key]['quantity'] = $qty[$key];
    $_SESSION['cart'][$key]['total_price'] = $qty[$key] * $_SESSION['cart'][$key]['price'];
  }
}
function get_qty_product($id)
{
  $result = db_fetch_row("SELECT quantity FROM products where id = $id");
  return $result;
}
