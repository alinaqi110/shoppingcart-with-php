<?php
    session_start();

    if(isset($_POST['event'])){
        $name = $_POST['pro0'];
        $price = $_POST['pro1'];
        $quantity = $_POST['pro2'];
        $btn = $_POST['event'];

        $product = array($name,$price,$quantity);
        if($btn == "Update"){
            $_SESSION[$name] = $product;
            header('location:viewCart.php?value=updated');
        }else if($btn == "Delete"){
            unset($_SESSION[$name]);
            header('location:viewCart.php?value=deleted');
        }
        
    }
?>