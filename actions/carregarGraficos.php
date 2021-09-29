<?php 

include "actions/defaultSqlConnection.php";

//Carregando indicador CLIENTES
$query_select = "SELECT COUNT(DISTINCT nome) FROM clientes;";
$select = mysqli_query($connect,$query_select);
$clientes=0;
if(isset($select))
{
  $clientes=mysqli_fetch_all($select)[0][0];
           
}
echo "<script type=\"text/javascript\">
        indicador=document.getElementById('clientes');
        indicador.innerText=".$clientes.
        "</script>";

//Carregando indicador VENDAS
$query_select = "SELECT COUNT(DISTINCT ID) FROM vendas;";
$select = mysqli_query($connect,$query_select);
$vendas=0;
if(isset($select))
{
  $vendas=mysqli_fetch_all($select)[0][0];
           
}
echo "<script type=\"text/javascript\">
        indicador=document.getElementById('vendas');
        indicador.innerText=".$vendas.
        "</script>";

//Carregando indicador RECEITA
$query_select = "SELECT SUM(valor) FROM vendas;";
$select = mysqli_query($connect,$query_select);
$receita=0;
if(isset($select))
{
  $receita=mysqli_fetch_all($select)[0][0];         
}
echo "<script type=\"text/javascript\">
        indicador=document.getElementById('receita');
        indicador.innerText=
        new Intl.NumberFormat('pt-br', { style: 'currency', currency: 'BRL' }).format(".$receita.
        ");</script>";


//Filtrando as vendas        
$query_select = "SELECT YEAR(dataDaVenda),MONTH(dataDaVenda),SUM(valor) FROM vendas GROUP BY 
                 YEAR(dataDaVenda), MONTH(dataDaVenda);";
$select = mysqli_query($connect,$query_select);       
if(isset($select))
{
     $valores="['Periodo','Receita'],";
     while($data=mysqli_fetch_array($select))
     {
         $valores=$valores."[new Date(".$data[0].",".$data[1].",1),".number_format($data[2],2,'.','')."],";
     }            
     $valores=substr($valores,0,-1);

     $JSname="scripts/area-chart.js";
     $JS= str_replace("\"-valores-\"",$valores,file_get_contents($JSname));

     echo "<script type=\"text/javascript\">".$JS."</script>";
}

$JSname="scripts/bar-chart.js";

//Selecionando TOP Produtos
$query_select = "select produtos.produto,COUNT(vendas.valor) as total from produtos 
             left join vendas on produtos.ID=vendas.produtoID
             group by produtos.produto
             order by total desc
             limit 3;";
$select = mysqli_query($connect,$query_select);       
if(isset($select))
{
 $valores="['Produto','Vendas'],";   

     while($data=mysqli_fetch_array($select))
     {
         $valores=$valores."['".$data[0]."',".$data[1]."],";
     }            
     $valores=substr($valores,0,-1);
     $JS= str_replace("\"-produtos-\"",$valores,file_get_contents($JSname));            
} 

//Selecionando TOP Clientes
$query_select = "select clientes.nome,SUM(vendas.valor) as total from clientes 
             left join vendas on clientes.ID=vendas.clienteID
             group by clientes.nome
             order by total desc
             limit 3;";
$select = mysqli_query($connect,$query_select);       
if(isset($select))
{
 $valores="['Clientes','Receita'],";
 while($data=mysqli_fetch_array($select))
 {
     $valores=$valores."['".$data[0]."',".$data[1]."],";
 }            
 $valores=substr($valores,0,-1);
 $JS= str_replace("\"-clientes-\"",$valores,$JS);
     
}

echo "<script type='text/javascript'>".$JS."</script>";

?>
