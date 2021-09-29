var deleteButtons=document.getElementsByClassName('deleteButton');
var editButtons=document.getElementsByClassName('editButton');

for(var i=0;i<deleteButtons.length;i++)
{
    deleteButtons[i].onclick=deleteClicked;
    editButtons[i].onclick=editClicked;    
}

function deleteClicked()
{
    var row=this.closest("tr");
    var produto=row.cells[1].innerText;

    var resposta=confirm("Deseja excluir o produto \""+produto+"\"?");

    if(resposta)
    {
        var ID=row.cells[0].innerText;
        
        fetch("http://localhost/sistema-vendas/actions/deleteItem.php",
        {
            method:"POST",
            headers: 
            {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: new URLSearchParams({
                'ID': ID
                })
        }
        )
        .then((response) => response.text())
        .then((res) => (alert(res)));

    }
}

function editClicked()
{
    var myModal = document.getElementById('myModal');    
    myModal.classList.remove('animate');

    var row=this.closest('tr');
    var inputs=document.getElementsByClassName('editInput');
    var sameRow=false;     
    if(inputs!=null)
    {
        var cells=Array.prototype.slice.call(inputs);        
        cells=cells.map(function(el){return el.parentElement;});
        for(var i=0;i<cells.length;i++)
        {
            cells[i].innerText=inputs[0].getAttribute('value');            
            sameRow=cells[i].parentElement.rowIndex==row.rowIndex;
            cells[i].classList.remove('Selected');          
        }
    }
    for(var i=1;i<row.cells.length-1;i++)
    {
        if(sameRow==false)
        {
            var input=document.createElement('input');
            input.setAttribute('type','text');
            input.setAttribute('class','editInput');
            var valor=row.cells[i].innerText;
            if(valor.startsWith("R$")){valor=valor.replace("R$ ","").replace(",",".");}
            input.setAttribute('value',valor);
            input.style.borderWidth='0px';
            input.style.backgroundColor='#fff647'
            input.style.width='100%';
            input.style.textAlign='inherit';
            input.style.margin=0;
            input.style.padding=0;           

            row.cells[i].innerHTML='';
            row.cells[i].style.padding=0;
            row.cells[i].appendChild(input);
            row.cells[i].classList.add('Selected');

            var myModal = document.getElementById('myModal');    
            myModal.classList.add('animate');
        }         
    }
}

