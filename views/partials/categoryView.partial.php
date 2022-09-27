<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td>
        <form action="/admin/categories/update" method="post">
            <input type="hidden" name="categoryId" value="<?= $row['id'] ?>">
            <button class="fa fa-pencil" type="submit" value="Bewerk categorie">
        </form>
        <form action="/admin/categories/delete" method="post">
            <input type="hidden" name="categoryId" value="<?= $row['id'] ?>">
            <button class="fa fa-trash" type="submit" value="Verwijderen categorie">
        </form>
    </td>
</tr>
