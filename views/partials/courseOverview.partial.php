<div class="cards-deck col-auto">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title text-primary"><?= $category['name'] ?></h5>
            <p class="card-text text-secondary"><?= $category['description'] ?> </p>
            <?php
            if (!Auth::isAdmin() && !Auth::isTeacher()){
                ?>
                    <p class="card-text text-dark"">Progressie cursus: </p>
                <div class="progress mb-2">
                    <div class="progress-bar" role="progressbar" style="width: <?=$category['progress'] == 0 ? '0' : $category['progress']/$category['courseSize']  * 100?>%;" aria-valuenow=" */<?=$category['progress'] == 0 ? '0' : $category['progress']/$category['courseSize']  * 100?>" aria-valuemin="0" aria-valuemax="100"> <?=$category['progress'] == 0 ? '0' : $category['progress']/$category['courseSize']  * 100?>%</div>
                </div>
                <?php
            }
            ?>
            <form method="post" action="courses/start">
                <input type="hidden" name="courseId" value="<?= $category['id'] ?>" />
                <button class="btn btn-primary" type="submit"><?=Auth::isAdmin() || Auth::isTeacher() || $category['startedCourse']? 'Ga verder met cursus' : 'Start cursus' ?></button>
            </form>
        </div>
    </div>
</div>
