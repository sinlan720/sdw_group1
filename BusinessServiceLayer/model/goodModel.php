<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class goodModel{
   // To store and retrieve all the information of good data.
    public $good_id,$name,$details,$quantity,$price,$image;
    
    function addGood(){
        //To get all new good information from goodController class and save in good table.
        $sql = "insert into good(good_name, good_details, good_quantity, good_price, good_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallGood(){
        //To retrieve all good information from good table and send them to goodController class.
        $sql = "select * from good";
        return DB::run($sql);
    }
    
    function viewGood(){
        //To retrieve good information from good table where good_id=good_id and send them to goodController class.
        $sql = "select * from good where good_id=:good_id";
        $args = [':good_id'=>$this->good_id];
        return DB::run($sql,$args);
    }
    

    function deleteGood(){
        //To get good_id from goodController and delete in good table.
        $sql = "delete from good where good_id=:good_id";
        $args = [':good_id'=>$this->good_id];
        return DB::run($sql,$args);
    }


    function modifyGood(){
        //To get all  good information from goodController 
        $sql = "update good set good_name=:name,good_details=:details,good_quantity=:quantity,good_price=:price,good_image=:image where good_id=:good_id";
        $args = [':good_id'=>$this->good_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }
    
    }
?>
