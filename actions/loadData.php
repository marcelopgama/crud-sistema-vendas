<?php
include __DIR__."\defaultSqlConnection.php";

$status=session_status();
if ($status!=2) session_start();
$table=$_SESSION["currentTable"];

$query_select = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE TABLE_SCHEMA='{$database}' 
                AND TABLE_NAME='{$table}';";
$result=mysqli_query($connect,$query_select);

echo "<thead class='table-dark' id='tableHead'>";
echo "<tr>";
$valorCol=null;
$i=0;
while ($data=mysqli_fetch_row($result))
{    
    $columnName=$data[0];
    echo "<th>{$columnName}</th>";
    if ($columnName=='valor') $valorCol=$i;
    $i=$i+1;
}
echo "<th></th></tr>";
echo "</thead>";

$query_select = "SELECT * FROM {$table};";
$select = mysqli_query($connect,$query_select);

while($row=mysqli_fetch_row($select))
{
    $j=0;
    echo "<tr>";
    foreach($row as $value)
    {
        if($j==$valorCol && $j!=0)
        {
            $price="R$ ".number_format($value,2,',','');
            echo "<td>{$price}</td>";
        }
        else
        {
            echo "<td>{$value}</td>";
        }
        $j=$j+1;
    }
    echo "<td>
                <input type='image' alt='Editar' src='icons/pencil-square.svg' class='editButton'> Editar | 
                <input type='image' alt='Editar' src='icons/trash.svg' class='deleteButton'> Excluir
        </td>";
    echo "</tr>"; 
}

?>