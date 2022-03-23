<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/form_register.css">
    <link rel="stylesheet" href="/css/globals.css">
    <title>Cadastro</title>
  </head>
  <body>
    <div class="form_container">
      <form action="/register" method="POST">
          <fieldset>
            <legend>Dados de acesso</legend>
            <label for="name">Nome</label>
            <div>
              <input type="text" name="name" id="name" required>
            </div>
            <label for="name">Email</label>
            <div>
              <input type="email" name="email" id="email" required>
            </div>
            <label for="password">Senha</label>
            <div>
              <input type="password" name="password" id="password" required>
            </div>
            <label for="check_password">Confirme a senha</label>
            <div>
              <input type="password" name="check_password" id="check_password" required>
            </div>
          </fieldset>
          <fieldset>
            <legend>Conta para movimentação</legend>
            <label for="bank_name">Nome do banco</label>
            <div>
              <input type="text" name="bank_name" id="bank_name">
            </div>
            <label for="account_number">Número da conta</label>
            <div>
              <input type="text" name="account_number" id="account_number">
            </div>
            <button type="submit">Registrar</button>
            <span><a href="/login">Já possuo cadastro</a></span>
          </fieldset>
      </form>
    </div>
  </body>
</html>