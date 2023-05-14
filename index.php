<?php 

include('includes/database.php');

include('includes/header.php');


?>

<main>
   <h2>Oferta</h2>
   <div style="margin: 20px">
      <?php

            if($stm = $connect->prepare('SELECT * FROM products')) {
               $stm->execute();
               $result = $stm->get_result();

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="product">
                                <div class="img-responsive"><img src="./images/<?php echo $row['image']; ?>"></div>
                                <h5 class="text-info"><?php echo $row["title"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["title"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
   </div>
</main>

<?php

include('includes/footer.php');

?>    