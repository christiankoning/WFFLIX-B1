<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ADSD</title>
</head>
<body>
<?php
require 'views/partials/adminNav.partial.php';
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Categoriën pagina:</h2>
                </div><br><br>
                <h6>Voeg categorie toe:</h6>
                  <form action="/admin/categories/create" method="post">
                <button class="fa fa-plus" type="submit" value="Voeg categorie toe">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if ($noCategories) {

    echo '<div class="alert alert-danger"><em>Geen categorie.</em></div>';
}
else {
    ?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Titel</th>
            <th>Omschrijving</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($stmt as $row){
            require 'views/partials/categoryView.partial.php';
        }
        ?>
        </tbody>
    </table>

    <?php
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>