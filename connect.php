<?php
    $connection = new mysqli("127.0.0.1", "root", "", "ukk");
    if(!$connection) {
        echo "Connection error";
        exit();
    }