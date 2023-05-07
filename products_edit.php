<?php

include('includes/config.php');
include('includes/database.php');

include('includes/header.php');
secure();

if (isset($_POST['title'])) {

    if ($stm = $connect->prepare('UPDATE products set title = ?, content = ?, image = ?, price = ?, WHERE id = ?')) {
        $stm->bind_param('ssssi', $_POST['title'], $_POST['content'], $_POST['image'], $_POST['price'], $_GET['id']);
        $stm->execute();

        $stm->close();

        setMessage("Produkt  " . $_GET['id'] . " został zaktualizowany");
     //   header('Location: products.php');
        die();

    } else {
        echo 'Could not prepare post update statement!';
    }



}


if (isset($_GET['id'])) {

    if ($stm = $connect->prepare('SELECT * from products WHERE id = ?')) {
        $stm->bind_param('i', $_GET['id']);
        $stm->execute();

        $result = $stm->get_result();
        $product = $result->fetch_assoc();

        if ($product) {

            ?>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1 class="display-1">Edytuj produkt</h1>

                        <form method="post">
                            <div class="form-outline mb-4">
                                <input type="text" id="title" name="title" class="form-control"
                                    value="<?php echo $product['title'] ?>" />
                                <label class="form-label" for="title">Title</label>
                            </div>
                            <div class="form-outline mb-4">
                                <textarea name="content" id="content"><?php echo $product['content'] ?></textarea>
                            </div>
                            <div class="form-outline mb-4">
                                <input class="form-control" id="image" name="image" type="file" name="uploadfile" value="<?php echo "./images/" . $product['image'] ?>" />
                                <label class="form-label" for="image">Zdjęcie</label>
                            </div>
                            <!--
                                <div class="form-outline mb-4">
                                    <input type="date" id="date" name="date" class="form-control" value="<?php echo $product['date'] ?>" />
                                    <label class="form-label" for="date">Date</label>
                                </div>
                            -->
                            <div class="form-outline mb-4">
                                <input type="text" id="price" name="price" class="form-control" value="<?php echo $product['price'] ?>" />
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
        }
        $stm->close();


    } else {
        echo 'Could not prepare statement!';
    }

} else {
    echo "No user selected";
    die();
}

include('includes/footer.php');
?>