<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class medicineModel{
    public $medicine_id,$name,$details,$quantity,$price,$image;
    
    function addMedicine(){
        $sql = "insert into medicine(medicine_name, medicine_details, medicine_quantity, medicine_price, medicine_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallMedicine(){
        $sql = "select * from medicine";
        return DB::run($sql);
    }
    
    function viewMedicine(){
        $sql = "select * from medicine where medicine_id=:medicine_id";
        $args = [':medicine_id'=>$this->medicine_id];
        return DB::run($sql,$args);
    }
    

    function deleteMedicine(){
        $sql = "delete from medicine where medicine_id=:medicine_id";
        $args = [':medicine_id'=>$this->medicine_id];
        return DB::run($sql,$args);
    }


    function modifyMedicine(){
        $sql = "update medicine set medicine_name=:name,medicine_details=:details,medicine_quantity=:quantity,medicine_price=:price,medicine_image=:image where medicine_id=:medicine_id";
        $args = [':medicine_id'=>$this->medicine_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }
    
    }
?>
