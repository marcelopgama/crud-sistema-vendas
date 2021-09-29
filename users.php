<?php include "components/header.php"?>
<?php $_SESSION["currentTable"]="usuarios"; ?>


<div style="text-align:right;padding:0 3% 0 2%;margin-bottom:20px">
    <span id="usuario">Usuários</span>
    <div id="underline"></div>
</div>


<div class="table-responsive" id="divTable">
<table id="mainTable" class="table-light table-striped table-hover table-bordered">            
        <?php include "actions/loadData.php"?>
</table>
</div>



<?php include "components/modalSaveChanges.php" ?>
<script type="text/javascript" src="scripts/set-events.js"></script>

</body>
</html>