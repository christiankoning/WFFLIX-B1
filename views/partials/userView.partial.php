<div class="cards-deck mx-auto">
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title text-primary">Gebruiker: <?= $row['name'] ?></h5>
            <p class="card-text text-secondary">Email: <br><?= $row['email'] ?> </p>
            <p class="card-text text-secondary">Rol: <br><?php
                if ($row['role'] == '0') {
                    echo 'Student';
                } else if ($row['role'] == '1') {
                    echo 'Leraar';
                } else if ($row['role'] == '2') {
                    echo 'Administrator';
                }
                ?> </p>
            <p class="card-text text-secondary">Gemaakt op: <br><?= $row['createdAt'] ?> </p>
            <p class="card-text text-secondary">Bewerkt op: <br><?= $row['updatedAt'] ?> </p>
            <div class="row">
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/users/update') ?>" method="post">
                        <input type="hidden" name="userId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger mb-2" <?= Auth::isAdmin() ? '' : 'disabled' ?> type="submit"
                                value="Bewerk gebruiker">Bewerk gebruiker
                        </button>
                    </form>
                </div>
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/users/delete') ?>" method="post">
                        <input type="hidden" name="userId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger" <?= Auth::isAdmin() && $row['id'] != $_SESSION['loggedInUser'] ? '' : 'disabled' ?> type="submit"
                                value="Verwijderen gebruiker">Verwijderen gebruiker
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>