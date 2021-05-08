<?php
require_once '../../BusinessServiceLayer/libs/database.php';
class cartModel{
    //To store and retrieve all the information of cartdata.
    public $cart_id,$cust_id,$name,$quantity,$price,$image;
    
    function addCart(){
        //To get all new cart information from cartController class and save in cart table.
        $sql = "insert into cart(cust_id, product_name, product_quantity, product_price, product_image) values(:cust_id, :name, :quantity, :price, :image)";
        $args = [':cust_id'=>$this->cust_id, ':name'=>$this->name, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    

    function viewallCart(){
        //To retrieve all cart information from cart table and send them to cartController class.
        $sql = "select * from cart";
        return DB::run($sql);
    }
    
    function viewCart(){
        //To retrieve cart information from cart table where cust_id=cust_id and send them to cartController class.
        $sql = "select * from cart where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id];
        return DB::run($sql,$args);
    }

    function modifyCart(){
        //To update cart where card_id=cart_id.
        $sql = "update cart set product_quantity=:quantity where cart_id=:cart_id";
        $args = [':quantity'=>$this->quantity, ':cart_id'=>$this->cart_id];
        return DB::run($sql,$args);
    }
   function deleteCart(){
    //To delete cart from cart where cart_id=cart_id.
        $sql = "delete from cart where cart_id=:cart_id";
        $args = [':cart_id'=>$this->cart_id];
        return DB::run($sql,$args);
    }
   function deleteAllCart(){
    //To delete all cart from cart where cart_id=cart_id.
        $sql = "delete from cart where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id];
        return DB::run($sql,$args);
    }


}
?>
