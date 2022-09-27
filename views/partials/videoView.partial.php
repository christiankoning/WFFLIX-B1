<div class="cards-deck mx-auto">
    <div class="card w-100">
        <div class="card-body">
            <h5 class="card-title text-primary">Video Titel: <?= $row['title'] ?></h5>
            <p class="card-text text-secondary">Omschrijving: <br><?= $row['description'] ?> </p>
            <p class="card-text text-secondary">Categorie: <br><?php
                echo $CATEGORIES->showOne($row['categoryId'])['name'];

                ?>
            </p>
            <p class="card-text text-secondary">Youtube link: <br><a target="_blank" href="<?= $row['youtubeLink'] ?>"><?= $row['youtubeLink'] ?> </a></p>
            <p class="card-text text-secondary">Gemaakt op: <br><?= $row['createdAt'] ?> </p>
            <p class="card-text text-secondary">Bewerkt op: <br><?= $row['updatedAt'] ?> </p>
            <div class="row">
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/videos/update') ?>" method="post">
                        <input type="hidden" name="videoId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger mb-2" type="submit"
                                value="Bewerk video">Bewerk video
                        </button>
                    </form>
                </div>
                <div class="col-6">
                    <form action="<?= Request::buildUri('/admin/videos/delete') ?>" method="post">
                        <input type="hidden" name="videoId" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger" type="submit"
                                value="Verwijderen video">Verwijderen video
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>