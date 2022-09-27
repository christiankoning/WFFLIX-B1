<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Verwijder <?= $modelName ?></h1></div>
                <div class="col"></div>
            </div>
            <form class="formcontainer" method="post" action="<?= Request::buildUri( '/admin/' . $model . '/delete') ?>">
                <input type="number" name="<?= $idName ?>" value="<?= $id ?>" hidden="true">
                <input type="number" name="confirmDelete" value="1" hidden="true">

                <h2>Weet u zeker dat u <?= $modelDesc ?> wilt verwijderen?</h2>
                <h3>Informatie over <?= $modelName?>:</h3>
                <?php
                if ($model === 'users')
                {
                    ?>
                <p><?= $userEmail  ?></p>
                <p><?= $userName ?></p>
                <?php
                }
                else if ($model === 'categories')
                {
                    ?>
                <p><?= $categoryName  ?></p>
                <p><?= $categoryDesc ?></p>
                <?php
                }
                else if ($model === 'videos')
                {
                    ?>
                <p><?= $videoTitle  ?></p>
                <p><?= $videoDesc?></p>
                <p><?= $videoLink?></p>
                <?php
                }
                ?>
                
                <a href="<?= Request::buildUri( '/admin/' . $model ) ?>">Annuleren</a>
                <button type="submit" class="btn">Verwijder definitief</button>
            </form>
        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>
