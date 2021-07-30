<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login</title>
  </head>
  <body>
    
    <div class="container">
        <div class="abs-center">
          <form action="../control/action/act_login.php" method="POST" class="border shadow p-3 rounded" style="width: 450px;">
            <div class="form-group">
                <h1>Iniciar Sesión</h1>

                <?php if(isset($_GET['error'])) { ?>
                  <div class="alert alert-danger" role="alert">
                    <?=$_GET['error']?>
                  </div>
                <?php }?>

              <label for="email">Correo</label>
              <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
            <div class="col-md-12 text-center">
                <a href="register.php">¿Aún no tienes cuenta? Registrate aquí</a>
            </div>
          </form>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>