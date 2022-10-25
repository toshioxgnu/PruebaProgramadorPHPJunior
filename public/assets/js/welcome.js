$(document).ready(function() {
    // alert('Welcome to the site!');
    traeUltimosValores();
});

//call controller with ajax
function traeUltimosValores() {
    $.ajax({
        type: 'POST',
        url: "http://www.localhost:8080/getIndicadoresUF",
        async:false,
        dataType: 'json',
        data:{
            'codigoIndicador': 'UF',
            'fechaInicial': '2019-01-01',
            'fechaFinal': '2022-10-24' 
        },
        success: function (data) {
            console.log(data);
            
        },
        error: function (error) {
            console.log(error);
        }
    });
}
