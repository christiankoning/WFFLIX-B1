<?php
require 'views/partials/head.partial.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-7"><h1>Cursussen</h1></div>
                <div class="col"></div>
            </div>
            <div class="row justify-content-center" style="height: 100%">
                <?php
                if ($noCategories) {
                    echo '<div class="alert alert-danger"><em>Geen cursussen.</em></div>';
                } else {
                    foreach ($categories as $category) {
                        require 'views/partials/courseOverview.partial.php';
                    }
                }
                ?>
            </div>

        </div>
    </div>
</div>
<?php
require 'views/partials/foot.partial.php';
?>