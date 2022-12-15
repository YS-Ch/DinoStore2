<?php
// Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array if needed
if (empty($_SESSION['cart'])) { $_SESSION['cart'] = array(); }

$products = array();
// Include cart functions
require_once('cart.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'show_cart';
    }
}


// Add or update cart as needed
switch($action) {
    case 'Add To Cart':
        $productID = $_POST['product_id'];
        $qty = $_POST['qty'];
        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $product_key = filter_input(INPUT_POST, 'product_id');
        $item_qty = filter_input(INPUT_POST, 'qty');
        $cost = filter_input(INPUT_POST, 'cost');
        $name = filter_input(INPUT_POST, 'name');
        add_item($product_key, $item_qty, $cost, $name);
        include('cart_view.php');
        break;
    case 'Update':
        $new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, 
                                     FILTER_REQUIRE_ARRAY);
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'Continue Shopping':
        header("Location:products.php");
        break;
    case 'Clear Cart':
        include("deleteCart.php");
        header("Refresh:0");
        break;
}
?>