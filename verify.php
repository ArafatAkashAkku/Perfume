<?php
session_start();
require_once 'config.php'; 
include 'dbConnect.php';

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = "SELECT * from `user_info` WHERE `email`='$_GET[email]' AND `v_code`='$_GET[v_code]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 0) {
                $update = "UPDATE `user_info` SET `verified`='1' WHERE `email`='$result_fetch[email]'";
                if (mysqli_query($con, $update)) {
                    echo "
         <script>
         alert('Email verification successful');
         window.location.href='login.php';
         </script>
         ";
                } else {
                    echo "
         <script>
         alert('Can not run query');
         window.location.href='login.php';
         </script>
         ";
                }
            } else {
                echo "
         <script>
         alert('Email already registered');
         window.location.href='login.php';
         </script>
         ";
            }
        }
    } else {
        echo "
         <script>
         alert('Can not run query');
         window.location.href='login.php';
         </script>
         ";
    }
}
