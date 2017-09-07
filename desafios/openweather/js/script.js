$("#result").hide();
$("#load-flash").hide();

function searchCEP(e) {
    var cep  = $("#cep").val();

    $("#form_container").hide();
    $("#load-flash").show();


    var link = "http://api.openweathermap.org/data/2.5/weather?q="+cep+"&appid=c339d12131aef31ec0a8e399cbf64793";
    $.getJSON(
        link,
        function (data) {
            $("#result").show();
            $("#load-flash").hide();
            $("#res-titulo").append(" <strong>"+data.name+"</strong>, "+ data.sys.country) ;
            $("#temp").append("Temperatura: <strong>"+data.main.temp+"</strong>") ;
            $("#vento").append("Velocidade do Vento <strong>"+data.wind.speed+"</strong> e Direção: <strong>"+data.wind.deg+"</strong>") ;
            $("#humidade").append("Humidade <strong>"+data.main.humidity +" %</strong>") ;
            $("#temp_max").append("Temperatura Maxima: <strong>"+data.main.temp_max+"</strong>") ;
            $("#temp_min").append(" Temperatura Minima: <strong>"+data.main.temp_min+"</strong>") ;


        }
    );
}