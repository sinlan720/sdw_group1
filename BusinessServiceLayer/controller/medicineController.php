<?php
require_once '../../BusinessServiceLayer/model/medicineModel.php';

class medicineController{
    
    function add(){
        $medicine = new medicineModel();
        // $medicine->medicine_id = $_POST['medicine_id'];
        $medicine->name = $_POST['name'];
        $medicine->details = $_POST['details'];
        $medicine->quantity = $_POST['quantity'];
        $medicine->price = $_POST['price'];
        $medicine->image = $_POST['image'];
        if($medicine->addMedicine() > 0){
             $message = "Medicine Successfully Added!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageMedicalInterface/medicineList.php';</script>";
        }
    }
    
    function viewAll(){
        $medicine = new medicineModel();
        return $medicine->viewallMedicine();
    }
    
    function viewMedicine($medicine_id){
        $medicine = new medicineModel();
        $medicine->medicine_id = $medicine_id;
        return $medicine->viewMedicine();
    }
    
    function editMedicine(){
        $medicine = new medicineModel();
        $medicine->medicine_id = $_POST['medicine_id'];
        $medicine->name = $_POST['name'];
        $medicine->details = $_POST['details'];
        $medicine->quantity = $_POST['quantity'];
        $medicine->price = $_POST['price'];
        $medicine->image = $_POST['image'];
        if($medicine->modifyMedicine()){
            $message = "Success Update!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageMedicalInterface/view.php?medicine_id=".$_POST['medicine_id']."';</script>";
        }
    }
    
    function delete(){
        $medicine = new medicineModel();
        $medicine->medicine_id = $_POST['medicine_id'];
        if($medicine->deleteMedicine()){
            $message = "Success Delete!";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../../ApplicationLayer/ManageMedicalInterface/medicineList.php';</script>";
        }
    }
}
?>
