<?php include "components/header.php"?>    

<link rel="stylesheet" type="text/css" href="css/indexStyle.css">
<link rel="stylesheet" type="text/css" href="css/dashboardStyle.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 


<div style="text-align:right;padding:0 3% 0 2%;height:5vh">
    <span id="usuario">Dashboard</span>
    <div id="underline"></div>
</div>


<div style="text-align:left; margin:2% 2% 0 2%; height:max-content" id="mainPanel">
<!-- Painéis de indicadores-->
<div id="painel1">
    <div class="divIndicador" style="float:left">
        <img src="icons/people-fill.svg" style="width:20%;margin-left:10%;">
        <div style="width:80%;text-align:right;margin-right:10%">
            <span class="titulo">CLIENTES</span>
            <span class="valor" id="clientes"></span>
        </div>          
    </div>

    <div class="divIndicador" style="margin:0 auto 0 auto">
        <img src="icons/cart-fill.svg" style="width:20%;margin-left:10%;">
        <div style="width:80%;text-align:right;margin-right:10%">
            <span class="titulo">VENDAS</span>
            <span class="valor" id="vendas"></span>
        </div>
    </div>

    <div class="divIndicador" style="float:right">
        <img src="icons/coin.svg" style="width:20%;margin-left:10%;">
        <div style="width:80%;text-align:right;margin-right:10%">
            <span class="titulo">RECEITA</span>
            <span class="valor" id="receita"></span>
        </div>
    </div>
</div>

<!--Gráfico temporal-->
<div id="divGrafico1">
</div>

<div id="painel2">
    <!--Gráfico de barra-->
    <div id="divGrafico2">
    </div>
    <!--Gráfico de barra-->
    <div id="divGrafico3">
    </div>
</div>

</div>




<?php include "actions/carregarGraficos.php"; ?>

<script type="text/javascript">
    window.addEventListener('resize', function(event) 
    {   
        drawProdutosBarChart();
        drawClientesBarChart();
        drawAreaChart();
    }, true);
</script>


</body>
</html>