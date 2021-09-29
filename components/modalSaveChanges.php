<link rel="stylesheet" type="text/css" href="css/modalStyle.css">

<script type="text/javascript">

  function resetInputs()
  {
    var inputs=document.getElementsByClassName('editInput');       
    if(inputs!=null)
    {
        var cells=Array.prototype.slice.call(inputs);        
        cells=cells.map(function(el){return el.parentElement;});
        for(var i=0;i<cells.length;i++)
        {
            cells[i].innerHTML=inputs[0].getAttribute('value');
            cells[i].classList.remove('Selected');
        }
    }

    var myModal = document.getElementById('myModal');    
    myModal.classList.remove('animate');
  }

  function saveChanges()  
  {

    var inputs=document.getElementsByClassName('editInput');    
    var newValues=[]; 
    var id="";

    if(inputs!=null)
    {
      id=inputs[0].closest('tr').cells[0].innerHTML;      
      for(var i=0;i<inputs.length;i++)
      {
        var value=inputs[i].value;        
        newValues.push(value);         
      }
      
      var newValuesString=JSON.stringify(newValues);
    
      fetch("http://localhost/sistema-vendas/actions/saveChanges.php",
        {
            method:"POST",
            headers: 
            {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: new URLSearchParams({
                  'id': id,                  
                  'changes': newValuesString
                  })
        }
        )
        .then((response) => response.text())
        .then((res) => 
        {
          if(!alert(res)) location.reload(true);
        });
        

    }

    
  }
</script>


<div class="myModalClass" id="myModal" draggable="true">  
  <div class="modalHeader">
      Deseja confirmar as mudanças?
  </div>
  <div class="modalBody">
      <input type="button" value="Cancelar" name="cancelar" class="btn btn-outline-primary" onclick="resetInputs()">     
      <input type="submit" value="Salvar" name="salvar" class="btn btn-primary" onclick="saveChanges()">
  </div>
</div>