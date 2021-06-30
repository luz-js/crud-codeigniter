

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<style>
.btn{
    display: flex;
    flex-direction: row;
}

body{
    padding: 10vw;
}

.container-principal{
    box-shadow: 5px 5px 20px 10px rgba(0,0,0,0.10);
    padding-bottom: 0.5vw;
}

.crear{
    margin: 2vw;
}
</style>

<div class="container-principal">
  <?php if (session('message')) :?>
    <div class="alert alert-primary">
        <?= session('message') ?>
    </div>

<?php endif?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
        <?php 
            foreach ($user as $key => $value) :?>
                <tr>
                    <td><?= $value->id ?></td>
                    <td><?= $value->nombre ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td>
                        <div class="btn">
                            <a href="/blog/<?= $value->id ?>/edit">editar</a>
                            <form action="blog/delete/<?= $value->id ?>" method="POST"><button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button></form>
                        </div>
                    </td>
                </tr>    
        <?php endforeach?>
  </tbody>
</table>
<form action="blog/new" method="POST"><button type="submit" class="btn btn-primary crear">Crear nuevo usuario</button></form>  
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</html>