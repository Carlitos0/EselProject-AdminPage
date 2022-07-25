$(BuscarDatos());
$(BuscarUsuario());
function BuscarDatos(consulta){
    $.ajax({
        url: './utilities/busqueda.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta : consulta},
    })
    .done(function(rpta){
        $('#datos').html(rpta);
    })
    .fail(function(err){
        console.log(err);
    })
}
$(document).on('keyup','#box_search',function(){
    const value = $(this).val();
    if(value != ""){
        BuscarDatos(value);
    }
    else{
        BuscarDatos();
    }
});
/* BUSQUEDA USUARIOS */
function BuscarUsuario(consult){
    $.ajax({
        url: './utilities/busquedaUser.php',
        type: 'POST',
        dataType: 'html',
        data: {consult: consult},
    })
    .done(function(respuesta){
        $('#datosUser').html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}
$(document).on('keyup','#user_search',function(){
    const valor = $(this).val();
    if(valor != ""){
        BuscarUsuario(valor);
    }
    else{
        BuscarUsuario();
    }
});