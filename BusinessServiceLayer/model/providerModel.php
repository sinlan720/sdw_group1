<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class providerModel{
    //To store and retrieve provider information.
    public $provider_id,$name,$email,$phone,$address,$address2,$city,$state,$zipcode,$username,$password;
   
    function addProvider(){
        //To get all new service provider information from providerController class and save in provider table.
        $sql = "insert into provider(provider_name, provider_email, provider_phone, provider_address, provider_address2, provider_city, provider_state, provider_zipcode, username, password, usergroup) values(:name, :email, :phone, :address, :address2, :city, :state, :zipcode, :username, :password, :usergroup)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode, ':username'=>$this->username, ':password'=>$this->password, ':usergroup'=>$this->usergroup];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallProvider(){
        //To retrieve all profile information from provider table and send them to providerController class.
        $sql = "select * from provider";
        return DB::run($sql);
    }
    
    function viewProvider(){
        //To retrieve all profile information from provider table where provider_id=provider_id and send them to providerController class.
        $sql = "select * from provider where provider_id=:provider_id";
        $args = [':provider_id'=>$this->provider_id];
        return DB::run($sql,$args);
    }
    
    function modifyProvider(){
        //To get all  service provider information from providerController class and update provider table.
        $sql = "update provider set provider_name=:name,provider_email=:email,provider_phone=:phone,provider_address=:address,provider_address2=:address2,provider_city=:city,provider_state=:state,provider_zipcode=:zipcode,username=:username,password=:password where provider_id=:provider_id";
        $args = [':provider_id'=>$this->provider_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode,':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
    // function deleteStud(){
    //     $sql = "delete from student where stud_ic=:stud_ic";
    //     $args = [':stud_ic'=>$this->stud_ic];
    //     return DB::run($sql,$args);
    // }
}
?>
