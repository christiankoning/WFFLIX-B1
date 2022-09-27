<div class="cards-deck col-auto">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-primary"><?= $category['name'] ?></h5>
            <p class="card-text text-secondary"><?= $category['description'] ?> </p>
            <form method="post" action="courses/start">
                <input type="hidden" name="courseId" value="<?= $category['id'] ?>" />
                <button class="btn btn-primary" type="submit">Start cursus</button>
            </form>
        </div>
    </div>
</div>
