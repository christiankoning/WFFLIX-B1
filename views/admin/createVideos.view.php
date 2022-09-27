<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Video Toevoegen</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/videos/create')?>">

                <label for="videoName"><b>Titel</b></label><Br>
                <input type="text" value="" name="videoName" id="videoName"><br>

                <label for="videoDesc"><b>Omschrijving</b></label><br>
                <textarea value="" name="videoDesc" id="videoDesc"></textarea><br>

                <label for="videoLink"><b>Video Link</b></label><br>
                <input type="text" value="" name="videoLink" id="videoLink"><br>

                <label for="categoryId"><b>Categorie</b></label><br>
                <select name="categoryId">
                    <?php
                        foreach ($categories as $category)
                        {
                            echo "<option value='".$category['id']."'>".$category['name']."</option>";

                        }
                    ?>
                </select>

                <br>
                <button type="submit" class="btn">Video toevoegen</button>
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