<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students' Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/read_style.css">
    

</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="title-container d-flex flex-column justify-content-center">
        <h1 class="pageTitle">Student Management System</h1>
        <h3 class="subTitle align-items-start">Students' Data Platform</h3>
    </div>

    <div class="table-container p-3">
    
    <table class="table table-hover table-bordered border-dark">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Father's Name</th>
            <th>Options</th>
        </thead>
        <tbody>

            <!-- <tr class="table-hover">
                <td>1</td>
                <td>Lwin</td>
                <td>Male</td>
                <td>Mandalay</td>
                <td>09-000000</td>
                <td>U Lwin</td>
            </tr> -->

            <?php
                require_once('./db_connection.php');

                $sql = "SELECT * FROM student_data";
                $query = mysqli_query($connection,$sql);

                while ($row = mysqli_fetch_assoc($query)) {
                    
                    echo 
                    "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['father_name']}</td>
                        <td>
                            <a href='insert_data.php' class='p-1 btn-outline-dark'>Insert</a>
                            <a href='update_data.php?id={$row['id']}' class='p-1 btn-outline-dark'>Update</a>                            
                            <a href='delete_data.php?id={$row['id']}' class='p-1 btn-outline-dark'>Delete</a>                            
                        </td>    
                    </tr>
                    ";

                }

            ?>

<!-- <a href='delete_data.php?id={$row['id']}' class='p-1 btn-outline-dark'>Delete</a> -->

        </tbody>
    </table>
    </div>
</body>
</html>