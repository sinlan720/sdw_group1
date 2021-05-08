<?php
require_once '../../BusinessServiceLayer/model/cartModel.php';

class cartController{
    //To control the flow add, delete, edit and view cart of input and output between boundary and model class.
    
    function add(){
        //To handle cart information inputs form and send them to cartModel class.
        $cart = new cartModel();
        $cart->cust_id = $_SESSION['userid'];
        $cart->name = $_POST['name'];
        $cart->quantity = $_POST['quantity'];
        $cart->price = $_POST['price'];
        $cart->image = $_POST['image'];

        if($cart->addCart() > 0){
            $message = "Items Successfully Added to the Cart!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePaymentInterface/payment.php';</script>";
        }
    }
    
    function viewAll(){
        //To retrieve all cart information from cartModel class to view.
        $cart = new cartModel();
        return $cart->viewallCart();
    }
    
    function viewCart(){
        //To retrieve cart information from cartModel class to view.
        $cart = new cartModel();
        $cart->cust_id = $_SESSION['userid'];
        return $cart->viewCart();
    }

    
    function updateCart(){
        // To get and set quantity from cartModel class.
        $cart = new cartModel();
        $cart->cart_id = $_POST['cart_id'];
        $cart->quantity = $_POST['quantity'];
        if($cart->modifyCart()){
        $message = "Successfully Updated Quantity!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePaymentInterface/payment.php?cart_id=".$_POST['cart_id']."';</script>";
        }
    }
    
    function delete(){
        //To get cart_id and delete from cartModel class.
        $cart = new cartModel();
        $cart->cart_id = $_POST['cart_id'];
        if($cart->deleteCart()){
             $message = "Successdully Deleted Item from the Shopping Cart!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../../ApplicationLayer/ManagePaymentInterface/payment.php?cart_id=".$_POST['cart_id']."';</script>";
        }
    }
 function deleteAll(){
    //To get all cart and delete from cartModel class.
        $cart = new cartModel();
        $cart->cust_id = $_SESSION['userid'];
        $cart->deleteAllCart();
    }
 
   
    
}
?>
