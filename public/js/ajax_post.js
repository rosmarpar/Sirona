$(document).ready(function(){
    ajax_post(); 
});

function ajax_post() {
    
    $("#input_text").keyup(function(){
        let search = $("#input_text").val();
        $.post('/user/ajax_post', {info:search}, function(data){

            $('p').remove();
            $('table').remove();
            let table = document.createElement('table');
            table.setAttribute('class', 'table');
            data.forEach(task => {
               if($("#input_text").val() != ''){        
                    let tr = document.createElement('tr');                 
                    for(let i = 0; i < task.length; i++){
                        let td = document.createElement('td');
                        td.innerHTML = task[i];
                        tr.appendChild(td);
                    }
                    table.appendChild(tr);
                    document.getElementById('result').appendChild(table);
                    $('#result').append(content);
               }
            }); 
        });
    });
   
}