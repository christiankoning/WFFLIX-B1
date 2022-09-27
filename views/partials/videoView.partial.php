<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php
        echo $CATEGORIES->showOne($row['categoryId'])['name'];

        ?></td>
    <td><?php echo $row['youtubeLink'];?></td>
    <td>
        <form action="/admin/videos/update" method="post">
            <input type="hidden" name="videoId" value="<?= $row['id'] ?>">
            <button class="fa fa-pencil" type="submit" value="Bewerk video">
        </form>
                <form action="/admin/videos/delete" method="post">
                    <input type="hidden" name="videoId" value="<?= $row['id'] ?>">
                    <button class="fa fa-trash" type="submit" value="Verwijderen video">
                </form>
    </td>
</tr>
