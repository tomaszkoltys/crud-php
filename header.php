<?php
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location: login.php");
    }
?>
<nav class="navbar" style="background-color: #faedcd;">
    <div class="container-fluid">
        <a href="#"><i class="fa-brands fa-php fa-4x" style="color: #d4a373"></i></a>
        <?php
        if(isset($_SESSION['username'])){
            echo '<div class="d-flex gap-3">
            <div class="fs-5 d-flex align-items-center justify-content-center"><span class="fw-normal">Hello&nbsp;</span> <span class="font-weight-bold">' . $_SESSION["username"] . '</span>!</div>
            <div class="pt-3">
                <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                    <input type="submit" name="logout" value="Logout" class="btn btn-danger">
                </form>
            </div>
            </div>';
        }
        
        ?>
        <h5 style="color: #463f3a"><span class="text-success">C</span><span class="text-danger">R</span><span class="text-secondary">U</span><span class="text-info">D</span> Application</h5>
    </div>
</nav>