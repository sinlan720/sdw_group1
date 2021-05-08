<?php
require_once '../../BusinessServiceLayer/libs/database.php';
require_once '../../BusinessServiceLayer/controller/cartController.php';

class paymentModel{
    public $payment_id,$cust_id,$name,$quantity,$price,$image,$status;
    
    function addOrder(){

        $DataArr = array();
        $cart = new cartController();
        $data = $cart->viewCart();

        foreach($data as $row){
            $fieldVal1 = $row[1];
            $fieldVal2 = $row[2];
            $fieldVal3 = $row[3];
            $fieldVal4 = $row[4];
            $fieldVal5 = $row[5];
            $fieldVal6 = 1;
            $DataArr[] = "('$fieldVal1', '$fieldVal2', '$fieldVal3', '$fieldVal4', '$fieldVal5', '$fieldVal6')";
        }

        $sql = "insert into payment (cust_id, product_name, product_quantity, product_price, product_image, order_status) values ";
        $sql .= implode(',', $DataArr);
        $stmt = DB::run($sql);
        $count = $stmt->rowCount();
        return $count;
    }
    

    function viewallPayment(){
        $sql = "select * from payment";
        return DB::run($sql);
    }
    
    function viewPayment(){
        $sql = "select * from payment where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id];
        return DB::run($sql,$args);
    }

}
?>
