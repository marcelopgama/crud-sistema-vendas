<?php 

include __DIR__."\defaultSqlConnection.php";

session_start();
$ID=$_POST['ID'];
$Table=$_SESSION["currentTable"];
$query= "DELETE FROM ".$Table." WHERE ID=".$ID;
$select = mysqli_query($connect,$query);    

if(isset($select))
{
    echo "O produto foi excluído com sucesso!";
}

?>

