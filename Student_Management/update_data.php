<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="./assets/insert_style.css">
</head>

<style>
        .navBar{
            width:100%;
            position: fixed;
            /* background-color: rgba(121, 121, 121, 0.327); */
            background: rgba( 255, 255, 255, 0.25 );
            -webkit-backdrop-filter: blur( 7px );
            border: 1px solid rgba( 255, 255, 255, 0.18 );
            transition: .75s ease;
        }

        .navBar:hover{
            box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
            backdrop-filter: blur( 7px );
        }

        .navBar ul{
            display: flex;
            justify-content:flex-end;
            align-items:center;
            list-style: none;
        }

        .nav-link{
            text-decoration:none;
            font-size:1.25rem;
            font-weight:300;
            text-transform:uppercase;
            color:black;
            margin:1em;
            transition:.75s ease;
        }

    </style>
</head>
<body>
        <nav class="navBar">
            <ul>
                <li><a href="insert_data.php" class="nav-link">Insert</a></li>
                <li><a href="read_data.php" class="nav-link">Read</a></li>
                <li><a href="update_data.php" class="nav-link">Update</a></li>
            </ul>            
        </nav>
    
        <div class="title-container">
            <h1 class="pageTitle">Student Management System</h1>
            <h3 class="subTitle">Data Insertion Platform</h3>
        </div>

    <div class="container">
        <div class="content-container">

            <!-- PHP -->
            <?php

                require_once('./db_connection.php');

                $id = $_GET['id'];
                $sql = "SELECT * FROM student_data WHERE id=$id";

                $query = mysqli_query($connection,$sql);
        
                $data = mysqli_fetch_assoc($query);
                        
                if(isset($_GET['updateBtn'])){

                    $getID = $_GET['id'];
                    $updateName = $_GET['name'];
                    $updateGender = $_GET['gender'];
                    $updateAddress = $_GET['address'];
                    $updatePhone = $_GET['phone'];
                    $updateFname = $_GET['Fname'];

                    $updateSQL = "UPDATE student_data SET name='$updateName', gender='$updateGender', address='$updateAddress',
                                  phone='$updatePhone', father_name='$updateFname' WHERE id='$getID'";

                    if(mysqli_query($connection,$updateSQL)){
                        header('location:read_data.php');
                    }
                    else{
                        echo 'Something went wrong!'.mysqli_error();
                    }
    

                }

            ?>


            <form action="" method="get">
                <div class="content-input-container">

                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" required>

                    <div class="input-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="" class="inputText" value="<?php echo $data['name']?>" required>
                    </div>

                    <div class="input-group">
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="" class="inputText" value="<?php echo $data['gender']?>" required>
                    </div>

                    <div class="input-group">
                        <label for="name">Address</label>
                        <input type="text" name="address" id="" class="inputText" value="<?php echo $data['address']?>" required>
                    </div>

                    <div class="input-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="" class="inputText" value="<?php echo $data['phone']?>" required>
                    </div>

                    <div class="input-group">
                        <label for="Fname">Father's Name</label>
                        <input type="text" name="Fname" id="" class="inputText" value="<?php echo $data['father_name']?>" required>
                    </div>

                    <div class="btn-group">
                        <input type="submit" value="Update" class="btn" name="updateBtn">
                    </div>

                </div>
            </form>


        </div>
    </div>

</body>

</html>