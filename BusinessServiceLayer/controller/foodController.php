<?php
require_once '../../BusinessServiceLayer/model/foodModel.php';

class foodController{
    
    function add(){
        $food = new foodModel();
        // $food->food_id = $_POST['food_id'];
        $food->name = $_POST['name'];
        $food->details = $_POST['details'];
        $food->quantity = $_POST['quantity'];
        $food->price = $_POST['price'];
        $food->image = $_POST['image'];
        if($food->addFood() > 0){
          $message = "Food Successfully Added!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageFoodInterface/foodList.php';</script>";
        }
    }
    
    function viewAll(){
        $food = new foodModel();
        return $food->viewallFood();
    }
    
    function viewFood($food_id){
        $food = new foodModel();
        $food->food_id = $food_id;
        return $food->viewFood();
    }
    
    function editFood(){
        $food = new foodModel();
        $food->food_id = $_POST['food_id'];
        $food->name = $_POST['name'];
        $food->details = $_POST['details'];
        $food->quantity = $_POST['quantity'];
        $food->price = $_POST['price'];
        $food->image = $_POST['image'];
        if($food->modifyfood()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageFoodInterface/view.php?food_id=".$_POST['food_id']."';</script>";
        }
    }
    
    function delete(){
        $food = new foodModel();
        $food->food_id = $_POST['food_id'];
        if($food->deleteFood()){
            $message = "Success Delete!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageFoodInterface/foodList.php';</script>";
        }
    }
}
?>
