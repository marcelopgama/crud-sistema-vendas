<?php

include __DIR__."\defaultSqlConnection.php";

session_start();
$table=$_SESSION["currentTable"];
$changes=$_POST['changes'];
$changes=str_replace("]",")",str_replace("[","(",$changes));
$query_insert="INSERT INTO {$table} VALUES {$changes}";

$result=mysqli_query($connect,$query_insert);

if($result>0)
{   
    echo "Item atualizado com sucesso!";       
}
else
{
    echo "Erro ao atualizar o item.";
}

?>