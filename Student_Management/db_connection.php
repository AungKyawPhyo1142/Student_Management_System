<?php

    $connection = mysqli_connect('localhost','root','','Student_Management');

    if(!$connection){
        echo 'Database connection faild!'.mysqli_connection_error();
    }