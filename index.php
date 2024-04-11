<?php
    include("db_conn.php");
    session_start();

    include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/28410f88d0.js" crossorigin="anonymous"></script>
    <title>CRUD</title>
</head>
<body>
    <div class="container mt-3">
        <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>
        <div class="border">

        
        <div class="container-fluid navbar mb-3 p-3" style="background-color: #D4A373;">
            <h3 style="color: #ffff; font-weight: 300;">Manage Employees</h3>
            <a href="add_new.php" class="btn btn-success">Add New</a>
        </div>
        <div class="px-3 pb-2">

        
        <table class="table table-striped text-center">
    <thead class="border-bottom border-black">
        <tr> 
        <th scope="col" class="border">ID</th>
        <th scope="col" class="border">First Name</th>
        <th scope="col" class="border">Last Name</th>
        <th scope="col" class="border">Email</th>
        <th scope="col" class="border">Gender</th>
        <th scope="col" class="border">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM employees";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="border"><?php echo $row['id'] ?></td>
                        <td class="border"><?php echo $row['first_name'] ?></td>
                        <td class="border"><?php echo $row['last_name'] ?></td>
                        <td class="border"><?php echo $row['email'] ?></td>
                        <td class="border"><?php echo $row['gender'] ?></td>
                        <td class="border">
                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-warning"><i class="fa-solid fa-gear fs-5 me-3"></i></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-danger"><i class="fa-solid fa-trash-can fs-5"></i></a>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>