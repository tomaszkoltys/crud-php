<?php
    include "db_conn.php";
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
    <div class="mt-5 shadow" style="margin-left: 400px; margin-right: 400px;">
        <div class="text-center mb-4 p-3" style="background-color: #D4A373;">
            <h3 style="color: #ffff">Add New Employee</h3>
        </div>
        <div class="container d-flex justify-content-center pt-3 pb-5">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" style="width:40vw; min-width:300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group mb-3">
                    <label>Gender:</label>&nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-label">Female</label>
                </div>
                <div>
                    <?php
                        if(isset($_POST['submit'])){
                            $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
                            $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
                            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                            $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
                            $gender = $_POST['gender'];

                            if(empty($first_name) || empty($last_name) || empty($email))
                            {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Fields cannot be empty
                            </div>';
                            }
                            elseif(!isset($gender)){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Select gender 
                            </div>';
                            }
                            else{
                                $sql = "INSERT INTO employees (first_name, last_name, email, gender) VALUES ('$first_name', '$last_name', '$email', '$gender')";
    
                                try{
                                    mysqli_query($conn, $sql);
                                    header("Location: index.php?msg=New employee added successfully");
                                }
                                catch(mysqli_sql_exception){
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    This email is taken
                                </div>';
                                }
                            }
                        }
                    ?>
                </div>
                <div class="container d-flex justify-content-center align-items-center gap-3">
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>