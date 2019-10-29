$(document).ready(function () {
    
});
const archivo = 'agregarcandidato.php';

$('#agregarCandidato').submit(function(){
    
    event.preventDefault();
    var prop = $('#propuesta').val();
    alert(prop);
    
    alert("sirvio");

    $.ajax(
        {
            url:archivo,
            type:'POST',
            data:new FormData($(this)[0]),
            cache:false,
            contentType: false,
            processData: false,
            datatype:'application/json'
        }
    )
    .done((response)=>{
        if(isJSONString(response)){
            console.log(response);
        }
        else{
            console.log(response);
        }
    })
})