<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class foodModel{
    public $food_id,$name,$details,$quantity,$price,$image;
    
    function addFood(){
        $sql = "insert into food(food_name, food_details, food_quantity, food_price, food_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallFood(){
        $sql = "select * from food";
        return DB::run($sql);
    }
    
    function viewFood(){
        $sql = "select * from food where food_id=:food_id";
        $args = [':food_id'=>$this->food_id];
        return DB::run($sql,$args);
    }
    

    function deleteFood(){
        $sql = "delete from food where food_id=:food_id";
        $args = [':food_id'=>$this->food_id];
        return DB::run($sql,$args);
    }


    function modifyFood(){
        $sql = "update food set food_name=:name,food_details=:details,food_quantity=:quantity,food_price=:price,food_image=:image where food_id=:food_id";
        $args = [':food_id'=>$this->food_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }
    
    }
?>
