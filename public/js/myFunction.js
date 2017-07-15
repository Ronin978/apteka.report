function oninputt(key) {            
    var all = parseFloat( document.getElementById('all'+key).value );
    var prihod = parseFloat( document.getElementById('prihod'+key).value );
    var vykor = parseFloat( document.getElementById('vykor'+key).value );
    document.getElementById('result'+key).value = all+prihod-vykor;
}

function oninput2(key) {
    var a=document.getElementById('in'+key).value;
    var b=document.getElementById('up'+key).value;

    var res=parseFloat(document.getElementById('res'+key).innerHTML);

    var inp = parseFloat(a) ;
    var up = parseFloat(b) ;


    
    if ((isNaN(inp) && isNaN(up)) ) {    
        alert('isNaN(inp) isNaN(up)');
        inp=0;
        up=0;               
    }

    else if(isNaN(up) && isNaN(inp)==false){
        alert('isNaN(up)');
        inp=parseFloat(document.getElementById('in'+key).value);
        up=0;
        
    }

    else if(isNaN(inp) && isNaN(up)==false){
        alert('isNaN(inp)');
        inp=0;
        up=parseFloat(document.getElementById('up'+key).value);
        
    }

    else alert('ERROR');

    document.getElementById('res'+key).innerHTML = res - up + inp;          

}


function checkUp() {
    document.getElementById('checkGroup').value = 'admin';
}

function checkDown(){
    document.getElementById('checkGroup').value = '';
}

function add(key){        
    var nodet = document.createElement('tr');        
    var node = document.createElement('td');        
    
    document.getElementById('tabl').appendChild(nodet);        
    nodet.appendChild(node);
}

function onAdd(){
    var table = document.getElementById("tableReport"); 
    var row = table.insertRow(table.rows.length); // Добавляем строку
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);

     // Формируем строку элементов управления
    var index = (table.rows.length-2);

    var text1 = document.createElement("p"); // Ввод text1
    text1.innerHTML= index+1;
    cell1.appendChild(text1);

    var text12 = document.createElement("input"); // Ввод text12
    text12.setAttribute("type", "hidden");
    text12.setAttribute("name", 'id_preparat'+index);
    text12.setAttribute("value", index+1);
    cell1.appendChild(text12);


    var text2 = document.createElement("input"); // Ввод text2
    text2.setAttribute("type", "text");
    text2.setAttribute("name", 'title'+index);
    cell2.appendChild(text2);

    var text3 = document.createElement("input"); // Ввод text3
    text3.setAttribute("type", "text");
    text3.setAttribute("name", 'units'+index);
    cell3.appendChild(text3);

    var text4 = document.createElement("input"); // Ввод text4
    text4.setAttribute("type", "date");
    text4.setAttribute("name", 'termin'+index);
    cell4.appendChild(text4);

    var text5 = document.createElement("input"); // Ввод text5
    text5.setAttribute("type", "text");
    text5.setAttribute("name", 'all'+index);
    text5.setAttribute("id", 'all'+index);
    text5.setAttribute("oninput", 'oninputt(\''+index+'\');');
    cell5.appendChild(text5);

    var text6 = document.createElement("input"); // Ввод text6
    text6.setAttribute("type", "text");
    text6.setAttribute("name", 'prihod'+index);
    text6.setAttribute("id", 'prihod'+index);
    text6.setAttribute("oninput", 'oninputt('+index+');');
    cell6.appendChild(text6);

    var text7 = document.createElement("input"); // Ввод text7
    text7.setAttribute("type", "text");
    text7.setAttribute("name", 'vykor'+index);
    text7.setAttribute("id", 'vykor'+index);
    text7.setAttribute("oninput", 'oninputt('+index+');');
    cell7.appendChild(text7);

    var text8 = document.createElement("input"); // Ввод text8
    text8.setAttribute("type", "text");
    text8.setAttribute("name", 'result'+index);
    text8.setAttribute("id", 'result'+index);
    cell8.appendChild(text8);
}

function CallPrint(strid) 
{ 
    var prtContent = document.getElementById(strid); 
    var WinPrint = window.open('','','left=50,top=50,width=800,height=640,toolbar=0,scrollbars=1,status=0'); 
    
    WinPrint.document.write(prtContent.innerHTML); 
    WinPrint.document.close(); 
    WinPrint.focus(); 
    WinPrint.print(); 
    WinPrint.close();
     
    prtContent.innerHTML=strOldOne;
}
