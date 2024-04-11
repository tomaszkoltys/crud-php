<?php
    include "db_conn.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM employees WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: index.php?msg=Employee deleted successfully');
    }
    else{
        echo 'Failed: ' . mysqli_error($conn);
    }
?>