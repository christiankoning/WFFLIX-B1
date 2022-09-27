<div class="cards-deck mx-auto">
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title text-primary">Categorie naam: <?= $row['name'] ?></h5>
            <p class="card-text text-secondary">Omschrijving: <br><?= $row['description'] ?> </p>
            <p class="card-text text-secondary">Gemaakt op: <br><?= $row['createdAt'] ?> </p>
            <p class="card-text text-secondary">Bewerkt op: <br><?= $row['updatedAt'] ?> </p>
          <div class="row">
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/categories/update') ?>" method="post">
                        <input type="hidden" name="categoryId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger mb-2" type="submit"
                                value="Bewerk cateogrie">Bewerk categorie
                        </button>
                    </form>
                </div>
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/categories/delete') ?>" method="post">
                        <input type="hidden" name="categoryId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger" type="submit"
                                value="verwijderen categorie">Verwijderen categorie
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>