<?php
require_once '../../BusinessServiceLayer/libs/database.php';

class customerModel{
    //To store and retrieve customer information.
    public $cust_id,$name,$email,$phone,$address,$address2,$city,$state,$zipcode,$username,$password,$usergroup;
    
    function addCust(){
        //To get all new customer information from customerController class and save in customer table.
        $sql = "insert into customer(cust_name, cust_email, cust_phone, cust_address, cust_address2, cust_city, cust_state, cust_zipcode, username, password, usergroup) values(:name, :email, :phone, :address, :address2, :city, :state, :zipcode, :username, :password, :usergroup)";
        $args = [':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode, ':username'=>$this->username, ':password'=>$this->password, ':usergroup'=>$this->usergroup];
        $stmt = DB::run($sql, $args);
        $count = $stmt->rowCount();
        return $count;
    }
    
    function viewallCust(){
        //To retrieve all profile information from customer table and send them to customerController class.
        $sql = "select * from customer";
        return DB::run($sql);
    }
    
    function viewCustomer(){
        //To retrieve all profile information from customer table where cust_id=cust_id and send them to customerController class.
        $sql = "select * from customer where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id];
        return DB::run($sql,$args);
    }
    function viewCustomerFullAddress(){
        //To retrieve all profile information from customer table where cust_id=cust_id and send them to customerController class.
        $sql = "select concat(cust_address,', ',cust_address2,', ',cust_city,'. ',cust_state,', ',cust_zipcode) as fullAddress from customer where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id];
        $stmt = DB::run($sql,$args);
        $result = $stmt->fetchColumn();
        return $result;
    }
    
    function modifyCustomer(){
        //To get all  customer information from customerController class and update customer table.
        $sql = "update customer set cust_name=:name,cust_email=:email,cust_phone=:phone,cust_address=:address,cust_address2=:address2,cust_city=:city,cust_state=:state,cust_zipcode=:zipcode,username=:username,password=:password where cust_id=:cust_id";
        $args = [':cust_id'=>$this->cust_id,':name'=>$this->name, ':email'=>$this->email, ':phone'=>$this->phone, ':address'=>$this->address, ':address2'=>$this->address2, ':city'=>$this->city, ':state'=>$this->state, ':zipcode'=>$this->zipcode,':username'=>$this->username,':password'=>$this->password];
        return DB::run($sql,$args);
    }
    
    // function deleteStud(){
    //     $sql = "delete from student where stud_ic=:stud_ic";
    //     $args = [':stud_ic'=>$this->stud_ic];
    //     return DB::run($sql,$args);
    // }
}
?>
