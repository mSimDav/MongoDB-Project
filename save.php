<?php
require_once "connection.php";
$msg="";
$bulk = new MongoDB\Driver\BulkWrite;

if(isset($_POST['upload'])){
    $target="./images/".basename($_FILES['image']['name']);
    $data=array(
        '_id' => new MongoDB\BSON\ObjectID,
        'title'=>$_POST['title'],
        'about'=>$_POST['about'],
        'image'=>$target, 
    );
    $bulk->insert($data);
$client->executeBulkWrite('images1.images1',$bulk);
if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
       header('location:modifica.php');
    }else{
        $msg="Vai! Vai! Vai!!!";
    }
}