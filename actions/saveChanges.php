<?php

include __DIR__."\defaultSqlConnection.php";

session_start();
$id=$_POST['id'];
$table=$_SESSION["currentTable"];
$changes=json_decode($_POST['changes']);

$query_select = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA='{$database}' 
                AND TABLE_NAME='{$table}';";
$result=mysqli_query($connect,$query_select);

$query_update = "UPDATE {$table} SET ";

$i=0;
while ($data=mysqli_fetch_row($result))
{
    if($data[0]!="ID")
    {
        if(is_numeric($changes[$i]))
        {
            $query_update=$query_update.$data[0]."=".$changes[$i].",";
        }
        else
        {
            $query_update=$query_update.$data[0]."='".$changes[$i]."',";
        }         
        $i=$i+1; 
    }
}
$query_update=substr($query_update,0,-1);
$query_update=$query_update." WHERE ID={$id}";

$result=mysqli_query($connect,$query_update);

if($result>0)
{   
    echo "Item atualizado com sucesso!";       
}
else
{
    echo "Erro ao atualizar o item.";
}

?>