<div class="col mx-auto mb-2">
    <div class="card w-100">
        <img src="<?= $course['tumbnail']?>" class="card-img-top card-thumbnail" alt="youtube video">
        <div class="card-body">
            <h5 class="card-title text-primary"><?= $course['title'] ?></h5>
            <p class="card-text text-secondary"><?= $course['description'] ?> </p>

            <form method="post" action="/courses/view">
            <input type="hidden" name="courseId" value="<?= $course['id'] ?>" />
            <input type="hidden" name="courseSize" value="<?= $courseSize ?>" />
                <button class="btn btn-primary" type="submit" <?=$courseSize <= $progress || Auth::isAdmin() ? '' : 'disabled' ?>>Ga naar onderdeel</button>
            </form>
        </div>
    </div>
</div>