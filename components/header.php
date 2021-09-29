<?php 
    $status=session_status();
    if ($status!=2) session_start();
?>

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
    <link rel="stylesheet" type="text/css" href="css/headerStyle.css">    
    
</head>
<body>
    <nav class="headerPanel">
        <div class="linksHeaderPanel">
            <a class="headerButton" href="index.php">Home</a>
            <a class="headerButton" href="dashboard.php">Dashboard</a> 
            <a class="headerButton" href="users.php">Usuários</a> 
            <a class="headerButton" href="clientes.php">Clientes</a>
            <a class="headerButton" href="produtos.php">Produtos</a>  
            <a class="headerButton" href="vendas.php">Vendas</a>
        </div>
    </nav>

