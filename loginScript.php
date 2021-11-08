<?php 
        // Check If form submitted, insert form data into users table.

        $message    ="";
        // include database connection file
        include_once("connect.php");
        if(isset($_POST['login'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            if($user && $pass){
                $query = "SELECT * FROM userdb WHERE username='$user'";
                $res = mysqli_query($connection, $query);
                if(mysqli_num_rows($res != 0)){
                    $row = mysql_fetch_assoc($res);
                    $db_user = $row["username"];
                    $db_pass = $row["password"];
                    if($user == $db_user && $pass == $db_pass){
                        echo '<alert>Berhasil login</alert>';
                        header("location:view.php");
                        exit();
                    }else{
                        echo '<alert>Pass atau Username salah</alert>';
                    }
                }else{
                    echo '<alert>Pass atau Username salah</alert>';
                }
                
            } else{
                echo '<alert>Pass atau Username kosong</alert>';
            }
        }

        header("location:view.php");
                        exit();
        
        // Insert user data into table
   
     


       ?>