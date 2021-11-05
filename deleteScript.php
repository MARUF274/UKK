<?php 
        // Check If form submitted, insert form data into users table.

        $message    ="";
        $id =$_GET["id"];
                // include database connection file
        include_once("connect.php");
                
                    $nameFile = mysqli_query($connection, "SELECT gambar FROM bukudb WHERE id_buku = $id");
                    unlink($nameFile); 
                    mysqli_query($connection, "DELETE FROM bukudb WHERE id_buku = $id");
                    
        header("location:main.php");
                        exit();
        
        // Insert user data into table
   
     


       ?>