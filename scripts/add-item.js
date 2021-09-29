var addInput=document.getElementById('addInput');
var mainTable=document.getElementById('mainTable');
addInput.onclick=addRow;

function addRow()
{
    var cells=mainTable.rows[0].cells.length;
    var row=document.createElement('tr');    
    var height="35px";
    row.style.height=height;    
    
    for(var i=0;i<cells;i++)
    {
        var cell=document.createElement('td');

        if(i>0 && i<cells-1)
        {
            cell.style.backgroundColor='#fff647';
            var input=document.createElement('input');
                input.setAttribute('type','text');
                input.setAttribute('class','editInput');           
                input.style.borderWidth='0px';
                input.style.backgroundColor='#fff647';
                input.style.width='100%';
                input.style.textAlign='inherit';
                input.style.margin=0;
                input.style.padding=0;
                input.style.borderBottom='solid';
                input.style.borderColor='#636363'
                input.style.borderTop='none';
                input.style.borderLeft='none';
                input.style.borderRight='none';
                input.style.borderWidth='2px';
            cell.appendChild(input);    
        }       
        
        row.appendChild(cell);
    }
    mainTable.appendChild(row);
    row.scrollIntoView();

    var myModal = document.getElementById('myModal');     
    var copyModal=myModal.cloneNode(true);
    copyModal.setAttribute('id','myModal2');
    document.body.appendChild(copyModal);
    copyModal.classList.add('animate');
    var button=copyModal.children[1].children[1];
    button.onclick=Save;
    var buttonCancel=copyModal.children[1].children[0];
    buttonCancel.onclick=Cancel;
}
function Save()
{
    var cells=mainTable.rows[0].cells.length;
    var rows=mainTable.rows.length;
    var lastRowCells=mainTable.rows[rows-1].cells;           
    var changes=[];
    changes.push(null);
    for(var i=1;i<cells-1;i++)
    {
        changes.push(lastRowCells[i].firstChild.value);
    }
    console.log(changes);
    var changesStr=JSON.stringify(changes);

    fetch("http://localhost/sistema-vendas/actions/insertItem.php",
        {
            method:"POST",
            headers: 
            {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
            },
            body: new URLSearchParams({'changes':changesStr})
        }
        )
        .then((response) => response.text())
        .then((res) => 
        {
          if(!alert(res)) location.reload(true);
        });
}
function Cancel()
{
    
    var rowsCount =mainTable.rows.length;
    var lastRow=mainTable.rows[rowsCount-1];   
    mainTable.removeChild(lastRow);

    var myModal = document.getElementById('myModal2');    
    myModal.classList.remove('animate');
    document.body.removeChild(myModal);
}
