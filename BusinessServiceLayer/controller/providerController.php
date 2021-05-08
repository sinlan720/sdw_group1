<?php
require_once '../../BusinessServiceLayer/model/providerModel.php';

class providerController{
   //This class is responsible to control the login, update password and registration inputs of service provider between boundary and entity class.
    
    function add(){
      // register as new provider
        $provider = new providerModel();
        $provider->name = $_POST['name'];
        $provider->email = $_POST['email'];
        $provider->phone = $_POST['phone'];
        $provider->address = $_POST['address'];
        $provider->address2 = $_POST['address2'];
        $provider->city = $_POST['city'];
        $provider->state = $_POST['state'];
        $provider->zipcode = $_POST['zipcode'];
        $provider->username = $_POST['username'];
        $provider->password = $_POST['password'];
        $provider->usergroup = $_POST['usergroup'];
        if($provider->addProvider() > 0){
            // set the attributes of provider
             $message = "Provider Successfully Registered!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageLoginInterface/login.php';</script>";
        }
    }
    
    function viewAll(){
       // view all provider
        $provider = new providerModel();
        return $provider->viewallProvider();
    }
    
     function viewProvider($provider_id){
       // get data associate with $id
        $provider = new providerModel();
        $provider->provider_id = $provider_id;
        return $provider->viewProvider();
    }
        
    function editProvider(){
          // modify provider data
        $provider = new providerModel();
        $provider->provider_id = $_POST['provider_id'];
        $provider->name = $_POST['name'];
        $provider->email = $_POST['email'];
        $provider->phone = $_POST['phone'];
        $provider->address = $_POST['address'];
        $provider->address2 = $_POST['address2'];
        $provider->city = $_POST['city'];
        $provider->state = $_POST['state'];
        $provider->zipcode = $_POST['zipcode'];
        $provider->username = $_POST['username'];
        $provider->password = $_POST['password'];
        if($provider->modifyProvider()){
            //update provider data to providerModel
            $message = "Success Update!";
    echo "<script type='text/javascript'>alert('$message');
    window.location = '../../ApplicationLayer/ManageLoginInterface/profile.php?provider_id=".$_POST['provider_id']."';</script>";
        }
    }
    
    
  //   function delete(){
  //       $provider = new providerModel();
  //       $provider->stud_ic = $_POST['studID'];
  //       if($provider->deleteStud()){
  //           $message = "Success Delete!";
		// echo "<script type='text/javascript'>alert('$message');
		// window.location = '../view';</script>";
  //       }
  //   }
}
?>
