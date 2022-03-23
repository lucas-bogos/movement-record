<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/form_register.css">
  <link rel="stylesheet" href="/css/globals.css">
  <title>Login</title>
</head>
<body>
  <div class="form_container">
    <form action="/access" method="post">
      <fieldset>
        <legend>Login</legend>
        <label for="email">Email</label>
        <div>
          <input type="email" name="email" id="email">
        </div>
        <label for="password">Senha</label>
        <div>
          <input type="password" name="password" id="password">
        </div>
        <div>
          <button type="submit">Logar</button>
          <span><a href="/cadastro">Não tenho cadastro</a></span>
        </div>
      </fieldset>
    </form>
  </div>
</body>
</html>