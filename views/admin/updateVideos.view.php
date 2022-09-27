<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Update video</h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?=Request::buildUri( '/admin/videos/update')?>">
                <input type="number" name="videoId" value="<?= $id ?>" hidden="true">

                <label for="videoTitle"><b>Titel</b></label><Br>
                <input type="text" value="<?= $videoTitle; ?>" name="videoTitle" id="videoTitle"><br>

                <label for="videoDescription"><b>Omschrijving</b></label><br>
                <textarea maxlength="256" type="text" name="videoDescription" id="videoDescription"
                ><?= $videoDesc; ?></textarea><br>
                <label for="videoLink"><b>Youtube Link</b></label><br>
                <input type="text" value="<?= $videoLink; ?>" name="videoLink" id="videoLink"><br>

                <label id="videoCategory" for="videoCategory"><b>Video categorie</b></label><br>
                <select name="videoCategory">
                    <?php
                    foreach ($categories as $category) {
                        echo '<option value="'.  $category['id']   .'"';
                             if ($category['id'] == $categoryId) {
                                 echo ' selected';
                             }
                             echo '>' . $category['name'] . ' </option>';

                    } 
                    ?>

                </select>
                <br>
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
