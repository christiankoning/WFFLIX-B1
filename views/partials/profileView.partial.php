<ul class="list-group list-group-flush">
    <li class="list-group-item">Naam: <?= $stmt['name']; ?></li>
    <li class="list-group-item">Email: <?= $stmt['email']; ?></li>
    <li class="list-group-item">Rol: <?php
        if ($stmt['role'] == '0') {
            echo 'Student';
        } else if ($stmt['role'] == '1') {
            echo 'Leraar';
        } else if ($stmt['role'] == '2') {
            echo 'Administrator';
        }
        ?>
    </li>

    <li class="list-group-item">Gemaakt op: <?= $stmt['createdAt']; ?></li>
</ul>
