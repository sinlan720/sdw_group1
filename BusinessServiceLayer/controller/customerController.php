<?php
require_once '../../BusinessServiceLayer/model/customerModel.php';

class customerController{
    // The controller that is responsible to handle the login, update profile and registration inputs of the customer.
    
   function add(){
    // create new oject 
        $customer = new customerModel();
         // set the attributes of customer
        $customer->name = $_POST['name'];
        $customer->email = $_POST['email'];
        $customer->phone = $_POST['phone'];
        $customer->address = $_POST['address'];
        $customer->address2 = $_POST['address2'];
        $customer->city = $_POST['city'];
        $customer->state = $_POST['state'];
        $customer->zipcode = $_POST['zipcode'];
        $customer->username = $_POST['username'];
        $customer->password = $_POST['password'];
        $customer->usergroup = $_POST['usergroup'];
        if($customer->addCust() > 0){
            $message = "Customer Successfully Registered";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        // send to customerModel
        }
    }
    
    function viewAll(){
         // view all customer
        $customer = new customerModel();
        return $customer->viewallCust();
    }
    
  function viewCustomer(){
     // get data associate with $id
        $customer = new customerModel();
        $customer->cust_id = $_SESSION['userid'];
        return $customer->viewCustomer();
         //retrieve data from customerModel
    }

  function viewCustomerFullAddress(){
     // get data associate with $id
        $customer = new customerModel();
        $customer->cust_id = $_SESSION['userid'];
        return $customer->viewCustomerFullAddress();
         //retrieve data from customerModel
    }

     function editCustomer(){
        // modify customer data
        $customer = new customerModel();
        $customer->cust_id = $_POST['cust_id'];
        $customer->name = $_POST['name'];
        $customer->email = $_POST['email'];
        $customer->phone = $_POST['phone'];
        $customer->address = $_POST['address'];
        $customer->address2 = $_POST['address2'];
        $customer->city = $_POST['city'];
        $customer->state = $_POST['state'];
        $customer->zipcode = $_POST['zipcode'];
        $customer->username = $_POST['username'];
        $customer->password = $_POST['password'];
        if($customer->modifyCustomer()){
             //update customer data to customerModel
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLoginInterface/profile.php?cust_id=".$_POST['cust_id']."';</script>";
        }
    }
    
  //   function delete(){
  //       $customer = new customerModel();
  //       $customer->stud_ic = $_POST['studID'];
  //       if($customer->deleteStud()){
  //           $message = "Success Delete!";
		// echo "<script type='text/javascript'>alert('$message');
		// window.location = '../view';</script>";
  //       }
  //   }
}
?>
