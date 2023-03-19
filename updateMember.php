<?php
require_once "db/connect.php";
if(isset($_POST["submit"])){
    $mem_id=$_POST["mem_id"];
    $name=$_POST["name"];
    $sname=$_POST["sname"];
    $email=$_POST["email"];
    $book_id=$_POST["book_id"];

    $result=$controller->update($name,$sname,$email,$book_id,$mem_id);
    if($result){
        header("Location:index.php");
    }
}
?>