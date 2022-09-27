<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php
        if ($row['isAdmin'] == '1')
        {
            echo 'Ja';
        }
        else if ($row['isAdmin'] == '0')
        {
            echo 'Nee';
        }
        ?></td>
    <td>
        <form action="/admin/users/update" method="post">
            <input type="hidden" name="userId" value="<?= $row['id'] ?>">
            <button class="fa fa-pencil" type="submit" value="Bewerk gebruiker">
        </form>
                <form action="/admin/users/delete" method="post">
                    <input type="hidden" name="userId" value="<?= $row['id'] ?>">
                    <button class="fa fa-trash" type="submit" value="Verwijderen gebruiker">
                </form>
    </td>

</tr>
