<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `orders` SET `deliverystatus`='delivered' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Order Delivered');
           window.location.href='pending_orders_info.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Order not delivered');
           window.location.href='pending_orders_info.php';
            </script>
            ";
        }

}
?>