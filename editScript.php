<?php 
        // Check If form submitted, insert form data into users table.
    if(isset($_POST['addJudul'])) {

        $message    ="";
        $id =$_POST["id"];
        $judul = $_POST['addJudul'];
        $pengarang = $_POST['addPengarang'];
        $penerbit = $_POST['addPenerbit'];

        $targetDir = 'src/uploads/';
        // $fileName = $_FILES["file"]["name"];
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $targetFilePath = $targetDir . $newfilename;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // include database connection file
        include_once("connect.php");
                
        if(isset($_POST["addJudul"]) && !empty($_FILES["file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $getProduct = $connection->query("SELECT gambar FROM bukudb WHERE id_buku='$id'");
while ($fetchBook = $getProduct->fetch_assoc()){ 
    $filename = $fetchBook['gambar'];
}
                    unlink($filename);
                    $query = "UPDATE bukudb SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', gambar='$targetFilePath' WHERE id_buku=$id";
                    $insert = mysqli_query($connection, $query);
                    if($insert){
                        $message = "Successfully added new Product";
                        
                    }else{
                        $message = "File upload failed, please try again.";
                    } 
                }else{
                    $message = "Sorry, there was an error uploading your file.";
                }
            }else{
                $message = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        }else{
            $message = 'Please select a file to upload.';
        }
        header("location:main.php");
                        exit();
        
        // Insert user data into table
        
        


        }
        if(isset($_SESSION["message"])){
            echo($_SESSION["message"]);
            unset($_SESSION["message"]);
            
        }
        ?>