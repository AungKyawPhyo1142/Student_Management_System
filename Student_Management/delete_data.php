<?php

    require_once('./db_connection.php');


    $id = $_GET['id'];


    $sql = "DELETE FROM student_data WHERE id=$id";

    if(mysqli_query($connection,$sql)){
        header('location:./read_data.php');
    }
    else{
        echo 'Faild'.mysqli_error();
    }
