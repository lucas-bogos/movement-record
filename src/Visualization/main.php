<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/menu.css">
    <link rel="stylesheet" href="/css/globals.css">
    <link rel="stylesheet" href="/css/form_register.css">
    <title>Movement Record</title>
</head>
<body>
    <menu>
        <nav>
            <ul>
                <?php if(isset($_SESSION["user_logged"])): ?>
                    <li><?php echo  'Olá, <span>'.mb_convert_case($_SESSION["user_logged"], MB_CASE_TITLE, "UTF-8") ?></li>
                <?php endif; ?>
                <li><a href="/?logged">Deslogar</a></li>
            </ul>
        </nav>
    </menu>
    <main class="form_container">
        <form action="/resumo" method="POST">
            <fieldset>
                <legend>Crie uma movimentação</legend>
                <label for="account_type">Tipo de conta</label>
                <div>
                    <select name="account_type" id="account_type">
                        <option value="S">Poupança</option>
                        <option value="C">Corrente</option>
                    </select>
                </div>
                <label for="action_movement">Ação</label>
                <div>
                    <select name="action_movement" id="action_movement">
                        <option value="deposit">Depósito</option>
                        <option value="withdraw">Saque</option>
                    </select>
                </div>
                <label for="value">Valor de transação</label>
                <div>
                    <input id="value" name="value" type="text" placeholder="Digite somente números">
                </div>
                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </main>
</body>
</html>