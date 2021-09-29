<?php

include __DIR__."\defaultSqlConnection.php";

$login = $_POST['login'];
$senha = MD5($_POST['senha']);

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');
    window.location.href='http://localhost/sistema-vendas/cadastro.php';</script>";

    }
    else
    {
      
      $query_select = "SELECT login FROM usuarios WHERE login = '$login'";
      $select = mysqli_query($connect,$query_select);
      $array = mysqli_fetch_array($select);
     
      if(isset($array)){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');
        window.location.href='http://localhost/sistema-vendas/cadastro.php';</script>";
        die();

      }else
      {
        $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        $insert = mysqli_query($connect,$query);

        if($insert)
        {
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');
          window.location.href='http://localhost/sistema-vendas/index.php'</script>";
        }
        else
        {
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');
          window.location.href='http://localhost/sistema-vendas/cadastro.php'</script>";
        }
      }
    }
?>
