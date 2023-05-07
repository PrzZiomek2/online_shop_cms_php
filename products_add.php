<?php

include('includes/config.php');
include('includes/database.php');
include('includes/header.php');

secure();

if (isset($_POST['title'])){

    if ($stm = $connect->prepare('INSERT INTO products (title, content, image, price) VALUES (?, ?, ?, ?)')){
        
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "./images/" . $filename;
        move_uploaded_file($tempname, $folder);

        $stm->bind_param('ssss', $_POST['title'], $_POST['content'], $filename, $_POST['price']);
        $stm->execute();

        setMessage("Produkt " . $_POST['title'] . " został dodany");
        header('Location: products.php');
        $stm->close();
        die();

    } else {
        echo 'Could not prepare statement!';
    }

}


?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <h1 class="display-1">Dodaj produkt</h1>
       
        <form method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <input type="text" id="title" name="title" class="form-control" />
                    <label class="form-label" for="title">Tytuł</label>
                </div>
                <div class="form-outline mb-4">
                    <textarea name="content" id="content" ></textarea>
                </div>
                <!--
                    <div class="form-outline mb-4">
                        <input type="date" id="date" name="date" class="form-control" ?>" />
                        <label class="form-label" for="date">Date</label>
                    </div>
                -->
                <div class="form-outline mb-4">
                    <input class="form-control" id="image" name="image" type="file" name="uploadfile" />
                    <label class="form-label" for="image">Zdjęcie</label>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" id="price" name="price" class="form-control"" />
                    <label class="form-label" for="price">price</label>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Zapisz</button>
            </form>    
        </div>

    </div>
</div>

<script src="js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content'
    });
</script>
<?php
include('includes/footer.php');
?>