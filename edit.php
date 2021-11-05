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
                        <a href="main.php" class="nav-link ">Add Book</a>
                    </li>
                    <li class="nav-item ">
                        <a href="view.php" class="nav-link ">View Book</a>
                    </li>

                </ul>

            </div>

        </nav>
    </div>
    <div class="card mb-3 mx-auto border-info" style="max-width: 1200px; margin-top:150px;">
    <div class="card-header">
            <h2>UBAH BUKU</h2>
        </div>
        <?php $connection = new mysqli('localhost', 'root', '', 'ukk');
        $id = $_GET['id'];
$getProduct = $connection->query("SELECT * FROM bukudb WHERE id_buku=" . $id);
while ($fetchBook = $getProduct->fetch_assoc()){
?>
    <form style="margin: 20px 20px;" action="editScript.php" method="POST" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="addJudul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$fetchBook["judul"]?>" name="addJudul"> 
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" value="<?=$fetchBook["gambar"]?>" name="file">
                </div>
            </div>
            <div class="form-group row">
                <label for="addPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="addPengarang" value="<?=$fetchBook["pengarang"]?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="addPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="addPenerbit" value="<?=$fetchBook["penerbit"]?>">
                    <input type="hidden" name="id" value="<?=$fetchBook["id_buku"]?>">
                </div>
            </div>
            <?php 
        }
        ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button class="btn btn-success">Edit</button>
                </div>
            </div>

        </form>
        
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