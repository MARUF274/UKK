//

<?php 
        // Check If form submitted, insert form data into users table.

        $message    ="";
        // include database connection file
        include_once("connect.php");
        if(isset($_POST['regis'])){
            $nama = $_POST['nama'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];

                $insert = mysqli_query($connection, "INSERT INTO userdb (`nama`, `username`, `password`,) VALUES ('$nama', '$user', '$pass')");
                header("location:index.php");
                        exit();
        }

        // Insert user data into table
   
     


       ?>