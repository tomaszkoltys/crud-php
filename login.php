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
    <div class="mt-5 shadow" style="margin-left: 400px; margin-right: 400px;">
        <div class="text-center mb-4 p-3" style="background-color: #D4A373;">
            <h3 style="color: #ffff">Please Log In</h3>
        </div>
        <div class="container d-flex justify-content-center pt-3 pb-5">
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" style="width:40vw; min-width:300px;">
                <div class="col mb-3">
                    <div class="mt-3">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="mt-3">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div>
                    <?php
                        if(isset($_POST['submit'])){
                            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
                            $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

                            if(empty($username) || empty($password)){
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Fields cannot be empty
                            </div>';
                            }
                            else{
                                $sql = "SELECT * FROM users WHERE username = '$username'";
                                $result = mysqli_query($conn, $sql);
    
                                if(mysqli_num_rows($result) >0){ 
                                    $row = mysqli_fetch_assoc($result);
                                    if(password_verify($password, $row['password']))
                                    {
                                            $_SESSION['username'] = $username;
                                            header("Location: index.php?msg=Logged in!");
                                    }
                                    else{
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Incorrect password
                                        </div>';
                                            
                                    }
                                }
                                else{
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    User not found
                                </div>';
                                    
                                }
                            }
                        }
                    ?>
                </div>
                <div class="container d-flex flex-column justify-content-center align-items-center gap-3">
                    <button type="submit" class="btn btn-success" name="submit">Log in</button>
                    <a href="register.php" style="color: #463f3a">Register</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
