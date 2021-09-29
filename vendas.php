<?php include "components/header.php"?>
<?php $_SESSION["currentTable"]="vendas"; ?>

<div style="text-align:right;padding:0 3% 0 2%;margin-bottom:20px">
    <span id="usuario">Vendas</span>
    <div id="underline"></div>
</div>

<div class="table-responsive" id="divTable">
<table id="mainTable" class="table-light table-striped table-hover table-bordered">         
        <?php include "actions/loadData.php"?>
</table>
</div>

<div style="text-align:right;margin:7px 3% 0 0">
    <input type='button' value="Adicionar" id='addInput' class="btn btn-primary">
</div>

<?php include "components/modalSaveChanges.php" ?>
<script type="text/javascript" src="scripts/set-events.js"></script>
<script type="text/javascript" src="scripts/add-item.js"></script>
</body>
</html>