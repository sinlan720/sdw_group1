<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class runnerModel{
    //To store and retrieve runner information.
    public $runner_id,$name,$email,$phone,$address,$address2,$city,$state,$zipcode,$username,$password;
    
    function addRunner(){
        //To get all new runner information from runnerController class and save in runner table
        $sql = "insert into runner(runner_name, runner_email, runner_phone, runner_address, runner_address2, runner_city, runner_state, runner_zipcode, username, password, usergroup) values(:name, :email, :phone, :address, :address2, :city, :state, :zipcode, :username, :password, :usergroup)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode, ':username'=>$this->username, ':password'=>$this->password, ':usergroup'=>$this->usergroup];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallRunner(){
        //To retrieve all profile information from runner table and send them to runnerController class.
        $sql = "select * from runner";
        return DB::run($sql);
    }
    
    function viewRunner(){
        //To retrieve all profile information from runner table where runner_id=runner_id and send them to runnerController class.
        $sql = "select * from runner where runner_id=:runner_id";
        $args = [':runner_id'=>$this->runner_id];
        return DB::run($sql,$args);
    }
    
    function modifyRunner(){
        //To get all  runner information from runnerController class and update runner table.
        $sql = "update runner set runner_name=:name,runner_email=:email,runner_phone=:phone,runner_address=:address,runner_address2=:address2,runner_city=:city,runner_state=:state,runner_zipcode=:zipcode,username=:username,password=:password where runner_id=:runner_id";
        $args = [':runner_id'=>$this->runner_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode,':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
    // function deleteStud(){
    //     $sql = "delete from student where stud_ic=:stud_ic";
    //     $args = [':stud_ic'=>$this->stud_ic];
    //     return DB::run($sql,$args);
    // }
}
?>
