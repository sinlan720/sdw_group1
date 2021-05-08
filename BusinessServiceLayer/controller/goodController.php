<?php
require_once '../../BusinessServiceLayer/model/goodModel.php';

class goodController{
    
    function add(){
        // add new good
        //To handle good information inputs form from good class and send them to goodModel class.
        $good = new goodModel();
        // $good->good_id = $_POST['good_id'];
        $good->name = $_POST['name'];
        $good->details = $_POST['details'];
        $good->quantity = $_POST['quantity'];
        $good->price = $_POST['price'];
        $good->image = $_POST['image'];
        if($good->addGood() > 0){
          $message = "Medicine Successfully Added!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageGoodInterface/goodList.php';</script>";
        }
    }
    
    function viewAll(){
        //To retrieve all good information from goodModel class.
        $good = new goodModel();
        return $good->viewallGood();
    }
    
    function viewGood($good_id){
        //To retrieve good information from goodModel class.
        $good = new goodModel();
        $good->good_id = $good_id;
        return $good->viewGood();
    }
    
    function editGood(){
        //To get and set data from goodModel class.
        $good = new goodModel();
        $good->good_id = $_POST['good_id'];
        $good->name = $_POST['name'];
        $good->details = $_POST['details'];
        $good->quantity = $_POST['quantity'];
        $good->price = $_POST['price'];
        $good->image = $_POST['image'];
        if($good->modifyGood()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageGoodInterface/view.php?good_id=".$_POST['good_id']."';</script>";
        }
    }
    
    function delete(){
        //To get good_id and delete from goodModel class.
        $good = new goodModel();
        $good->good_id = $_POST['good_id'];
        if($good->deleteGood()){
            $message = "Success Delete!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageGoodInterface/goodList.php';</script>";
        }
    }
}
?>
