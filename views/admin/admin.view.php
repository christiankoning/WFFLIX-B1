<?php
require 'views/partials/adminHead.partial.php';
?>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
            <div class="col mx-auto mb-2">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Gebruikers</h5>
                        <p class="card-text text-secondary">Aantal gebruikers: <?= $userSize ?></p>
                        <a class="btn btn-primary" href="<?= Request::buildUri('admin/users') ?>">Ga naar gebruikers
                            overzicht</a>
                    </div>
                </div>
            </div>
            <div class="col mx-auto mb-2">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Categorieën</h5>
                        <p class="card-text text-secondary">Aantal categorieën: <?= $categorySize ?> </p>
                        <a class="btn btn-primary" href="<?= Request::buildUri('admin/categories') ?>">Ga naar
                            categorieën overzicht</a>
                    </div>
                </div>
            </div>
            <div class="col mx-auto mb-2">
                <div class="card w-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Videos</h5>
                        <p class="card-text text-secondary">Aantal video's: <?= $videoSize ?> </p>
                        <a class="btn btn-primary" href="<?= Request::buildUri('admin/videos') ?>">Ga naar videos
                            overzicht</a>
                    </div>
                </div>
            </div>
        </div>
        <!--For some extra spacing between the footer-->
        <div class="row mb-5"></div>
        <div class="row mb-5"></div>
        <div class="row mb-5"></div>
        <div class="row mb-5"></div>
    </div>

<?php
require 'views/partials/foot.partial.php';
?>