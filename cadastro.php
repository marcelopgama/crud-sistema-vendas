<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema para vendas</title>  
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">  
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">   
    
</head>
<body>

<link rel="stylesheet" type="text/css" href="css/indexStyle.css">

<form id="loginArea" method="POST" action="actions/cadastrar.php" class="border border-primary">
    <img class="databaseImage" src="icons/storage_black_24dp.svg"></img>

    <div class ="divContent">
        <img src="icons/person-fill.svg" id="userIcon">
        <input class="inputArea" type="text" name="login" placeholder="usuário"></input>
    </div>
    <div class ="divContent">
        <img src="icons/key-fill.svg" id="passwordIcon">
        <input class="inputArea" type="password" name="senha" placeholder="senha"></input>
    </div>
    <div style="text-align:right">
        <input type="submit" value="Cadastrar" id="inputButton" class="btn btn-primary" name="cadastrar">
        <input type="button" id="cancelButton" name="cancelar" value="Cancelar" onclick="location.href='http://localhost/sistema-vendas'" class="btn btn-outline-primary">
    </div>    
</form>

</body>
</html>