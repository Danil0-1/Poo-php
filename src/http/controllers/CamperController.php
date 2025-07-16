<?php

include_once "CrudController.php";

class CamperController extends CrudController
{
    public static array $dispatch =[
            "GET"=>"get",
            "POST"=>"create",
        ];
    public function get(){
        echo json_encode(['respone'=>'Recurso producto get del CamperController']);
    }
    public function create(){

    echo json_encode(['respone'=>'Recurso producto create']);
        
    }
    public function update(){
    echo json_encode(['respone'=>'Recurso producto updatet']);

    }
    public function delete(){
    echo json_encode(['respone'=>'Recurso producto delete']);

    }
}