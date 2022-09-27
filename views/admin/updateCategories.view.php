<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Update categorie</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/categories/update')?>">
                <input type="number" name="categoryId" value="<?= $id ?>" hidden="true">

                <label for="categoryName"><b>Naam</b></label><Br>
                <input type="text" value="<?= $categoryName; ?>" name="categoryName" id="categoryName"><br>

                <label for="categoryDescription"><b>Omschrijving</b></label><br>
                <textarea maxlength="256" type="text" name="categoryDescription" id="categoryDescription"
                ><?= $categoryDesc; ?></textarea><br>
                <button type="submit" class="btn">Updaten</button>
            </form>
            <?php
            if (!empty($error)) {
                echo '<div class="errorContainer">
<p class="error-message">' . $error . '</p>
</div>';
            }

            ?>
        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>