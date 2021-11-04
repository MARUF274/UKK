<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="navigasi">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <button class="navbar-toggler " data-toggle="collapse" data-target="#navMenu">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navMenu">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item ">
                        <a href="main.php" class="nav-link ">Add VN</a>
                    </li>
                    <li class="nav-item ">
                        <a href="view.php" class="nav-link ">View VN</a>
                    </li>
                    <li class="nav-item ">
                        <a href="# " class="nav-link ">About Me</a>
                    </li>
                    <li class="nav-item ">
                        <a href="# " class="nav-link ">Contact</a>
                    </li>

                </ul>

            </div>

        </nav>
    </div>
    <div class="card mb-3 mx-auto border-info" style="max-width: 1200px; margin-top:150px;">
    <div class="card-header">
            <h2>DAFTAR BUKU </h2>
        </div>
    <form style="margin: 20px 20px;" action="add.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="addJudul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="addJudul">
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="file">
                </div>
            </div>
            <div class="form-group row">
                <label for="addPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="addPengarang">
                </div>
            </div>
            <div class="form-group row">
                <label for="addPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="addPenerbit">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button class="btn btn-success">ADD</button>
                </div>
            </div>

        </form>
        <?php 
        // Check If form submitted, insert form data into users table.
    if(isset($_POST['addJudul'])) {

        $message    ="";
        $judul = $_POST['addJudul'];
        $pengarang = $_POST['addPengarang'];
        $penerbit = $_POST['addPenerbit'];
        $targetDir = "uploads/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // include database connection file
        include_once("connect.php");
                
        if(isset($_POST["addJudul"]) && !empty($_FILES["file"]["name"])){
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = mysqli_query($connection, "INSERT INTO bukudb (`judul`, `pengarang`, `penerbit`, `gambar`) VALUES ('$judul', '$pengarang', '$penerbit', '$fileName')");
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
        
        // Insert user data into table
        
        


        }
        if(isset($_SESSION["message"])){
            echo($_SESSION["message"]);
            unset($_SESSION["message"]);
            
        }
        if($insert){
            header("location:main.php");
    exit();
        // Show message when user added
        }
        ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
</body>
</html>