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

    <div class="card mb-3 mr-auto ml-auto border-info" style="max-width: 1200px;">
        <div class="card-header text-center">
            <h2>DAFTAR BUKU </h2>
        </div>
        <div class="row no-gutters">
            <ul class="nav col-md-12 my-3 ">
                <a href="add.php" class="btn btn-primary mx-3">Tambah</a>

                <form class="form-inline ml-auto mx-4" style="margin-right: 2.1rem!important;">
                </form>
            </ul>
            <?php $connection = new mysqli('localhost', 'root', '', 'ukk');
$getProduct = $connection->query("SELECT * FROM bukudb ");
while ($fetchBook = $getProduct->fetch_assoc()){
?>
            <div class="col-md-3 my-3">

                <div class="card col-md-10 mx-auto" style="">

                    <h5 class="my-2"><?=$fetchBook["judul"]?></h5> 
                    <img src="<?=$fetchBook["gambar"]?>" class="card-img-top my-3" alt="..."
                        style="width: 216px;">
                        <p class="my-2">Pengarang: <?=$fetchBook["pengarang"]?></p> 
                        <p class="my-2">Penerbit: <?=$fetchBook["penerbit"]?></p>   
                        <hr> 
                    <div class="my-2">
                        <a href="edit.php?id=<?=$fetchBook["id_buku"]?>" class="btn btn-warning col-md-5">Edit</a>
                        <a href="deleteScript.php?id=<?=$fetchBook["id_buku"]?>" class="btn btn-danger col-md-5">Delete</a>
                    </div>
                </div>
                
            </div>
            <?php 
        }
        ?>
                        

        </div>
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