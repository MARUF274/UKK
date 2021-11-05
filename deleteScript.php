<?php 
        // Check If form submitted, insert form data into users table.

        $message    ="";
        $id =$_GET["id"];
                // include database connection file
        include_once("connect.php");

                $getProduct = $connection->query("SELECT gambar FROM bukudb WHERE id_buku='$id'");
while ($fetchBook = $getProduct->fetch_assoc()){ 
    $filename = $fetchBook['gambar'];
}
                    unlink($filename); 
                    mysqli_query($connection, "DELETE FROM bukudb WHERE id_buku = $id");
                    
        header("location:main.php");
                        exit();
        
        // Insert user data into table
   
     


       ?>