<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class petModel{
    public $petgroom_id,$name,$details,$quantity,$price,$image;
    
    function addpetgroom(){
        $sql = "insert into petgroom(petgroom_name, petgroom_details, petgroom_quantity, petgroom_price, petgroom_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallpetgroom(){
        $sql = "select * from petgroom";
        return DB::run($sql);
    }
    
    function viewpetgroom(){
        $sql = "select * from petgroom where petgroom_id=:petgroom_id";
        $args = [':petgroom_id'=>$this->petgroom_id];
        return DB::run($sql,$args);
    }
    

    function deletepetgroom(){
        $sql = "delete from petgroom where petgroom_id=:petgroom_id";
        $args = [':petgroom_id'=>$this->petgroom_id];
        return DB::run($sql,$args);
    }


    function modifypetgroom(){
        $sql = "update petgroom set petgroom_name=:name,petgroom_details=:details,petgroom_quantity=:quantity,petgroom_price=:price,petgroom_image=:image where petgroom_id=:petgroom_id";
        $args = [':petgroom_id'=>$this->petgroom_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }   
}
class pethotelModel{
    public $pethotel_id,$name,$details,$quantity,$price,$image;
    
    function addpethotel(){
        $sql = "insert into pethotel(pethotel_name, pethotel_details, pethotel_quantity, pethotel_price, pethotel_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallpethotel(){
        $sql = "select * from pethotel";
        return DB::run($sql);
    }
    
    function viewpethotel(){
        $sql = "select * from pethotel where pethotel_id=:pethotel_id";
        $args = [':pethotel_id'=>$this->pethotel_id];
        return DB::run($sql,$args);
    }
    

    function deletepethotel(){
        $sql = "delete from pethotel where pethotel_id=:pethotel_id";
        $args = [':pethotel_id'=>$this->pethotel_id];
        return DB::run($sql,$args);
    }


    function modifypethotel(){
        $sql = "update pethotel set pethotel_name=:name,pethotel_details=:details,pethotel_quantity=:quantity,pethotel_price=:price,pethotel_image=:image where pethotel_id=:pethotel_id";
        $args = [':pethotel_id'=>$this->pethotel_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }   
}
class petvetModel{
    public $petvet_id,$name,$details,$quantity,$price,$image;
    
    function addpetvet(){
        $sql = "insert into petvet(petvet_name, petvet_details, petvet_quantity, petvet_price, petvet_image) values(:name, :details, :quantity, :price, :image)";
        $args = [':name'=>$this->name, ':details'=>$this->details, ':quantity'=>$this->quantity, ':price'=>$this->price, ':image'=>$this->image];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallpetvet(){
        $sql = "select * from petvet";
        return DB::run($sql);
    }
    
    function viewpetvet(){
        $sql = "select * from petvet where petvet_id=:petvet_id";
        $args = [':petvet_id'=>$this->petvet_id];
        return DB::run($sql,$args);
    }
    

    function deletepetvet(){
        $sql = "delete from petvet where petvet_id=:petvet_id";
        $args = [':petvet_id'=>$this->petvet_id];
        return DB::run($sql,$args);
    }


    function modifypetvet(){
        $sql = "update petvet set petvet_name=:name,petvet_details=:details,petvet_quantity=:quantity,petvet_price=:price,petvet_image=:image where petvet_id=:petvet_id";
        $args = [':petvet_id'=>$this->petvet_id, ':name'=>$this->name, ':details'=>$this->details,':price'=>$this->price, ':quantity'=>$this->quantity, ':image'=>$this->image];
        return DB::run($sql,$args);
    }   
}