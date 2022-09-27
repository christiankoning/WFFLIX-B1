<?php
require 'views/partials/head.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1><?= $homeTitle; ?>!</h1>
                    <p class="lead">Vergroot je programmeer kennis!</p>
                </div>
                <div class="col"></div>
            </div>

            <hr>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?= Request::buildUri('/public/img/background.jpg') ?>"
                         class="d-block mx-lg-auto img-fluid"
                         alt="php example" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Volg tutorials</h1>
                    <p class="lead">Volg het op school, in de trein of gewoon op de WC!</p>

                </div>
            </div>
            <hr>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Heb jij moeite met PHP, C#, javascript of één van de vele
                        andere
                        programmeertalen?</h1>
                    <a class="btn btn-primary" href="<?= Request::buildUri('/courses') ?>">Start nu!</a>
                </div>
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?= Request::buildUri('/public/img/languages.png') ?>"
                         class="d-block mx-lg-auto img-fluid"
                         alt="languages" width="700" height="500" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>