<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Entrar no Sistema</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="<?= base_url();?>assets/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  
    <form class="form-signin" method='post' action="<?=base_url()?>dashboard/logar"  >
        

      <img class="mb-4" src="<?= base_url();?>assets/img/bos1.png" alt="" width="280" height="140">
      <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
      <label for="inputEmail" class="sr-only">Endereço de email</label>
      <input type="email"name="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
          
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
      <!-- <p class="mt-5 mb-3 text-muted"><a href="<?=base_url()?>dashboard/empresa">CADASTRAR EMPRESA</a></p> -->
    </form>
  </body>
</html>