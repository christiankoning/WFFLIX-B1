<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Categorie Aanmaken</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/categories/create')?>">

                <label for="categoryName"><b>Naam categorie</b></label><Br>
                <input type="text" value="" name="categoryName" id="categoryName"><br>

                <label for="categoryDesc"><b>Omschrijving</b></label><br>
                <textarea value="" name="categoryDesc" id="categoryDesc" ></textarea><br>
                <br>
                <button type="submit" class="btn">Categorie aanmaken</button>
            </form>
            <?php
            if (!empty($error))
            {
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
