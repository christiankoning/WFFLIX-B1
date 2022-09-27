<?php
require 'views/partials/adminHead.partial.php';
?>
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="container">
            <div class="row mx-auto">
                <div class="col-md-12">
                    <div class="mb-3 clearfix">
                        <h2 class="pull-left">Gebruikers pagina:</h2>
                    </div>
                    <br><br>
                    <form action="<?= Request::buildUri('/admin/users/create') ?>" method="post">
                        <button class="btn btn-primary" <?= Auth::isAdmin() ? '' : 'disabled' ?> type="submit"
                                value="Voeg gebruiker toe">Voeg gebruiker toe
                        </button>
                    </form>
                </div>
            </div>
            <div class="row row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3 mt-3 mx-auto">
                <?php
                if ($noUsers) {
                    echo '<div class="alert alert-danger"><em>Geen gebruikers.</em></div>';
                } else {
                    foreach ($stmt as $row) {
                        require 'views/partials/userView.partial.php';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<?php
require 'views/partials/foot.partial.php';
?>