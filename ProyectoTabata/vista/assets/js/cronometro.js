var xhr = new XMLHttpRequest();
xhr.open('GET','../control/action/act_viewTabata.php');

xhr.onload = function(){
    if(xhr.status == 200){
        var json = JSON.parse(xhr.responseText);

        let NombreTabata = json[0];
        let TiempoPreparacion = parseInt(json[1]);
        let TiempoActividad =  parseInt(json[2]);
        let NumeroSeries = parseInt(json[3]);
        let TiempoDescanso = parseInt(json[4]);

        let TiempoTabata = (TiempoPreparacion + ((TiempoActividad + TiempoDescanso) * NumeroSeries));

    
        var minute = Math.floor((TiempoTabata / 60) % 60);
        var second = TiempoTabata % 60;


        $("#NombreTabata").html(NombreTabata);
        $("#minutos").html('0'+minute);
        $("#segundos").html(second);
        $("#Ronda").html(NumeroSeries);
        $("#Preparacion").html(TiempoPreparacion);
        $("#Actividad").html(TiempoActividad);
        $("#Descanso").html(TiempoDescanso);


        $("#Biniciar").click( function(){
            function CargarSegundos(){
                let txtSegundos;
    
                if(second < 0){
                    second = 59;
                }
    
                if(second < 10){
                    txtSegundos = '0'+second; 
                }else{
                    txtSegundos = second;
                }
    
                $("#segundos").html(txtSegundos);
                second --;
    
                CargarMinutos(second);
            }
    
            function CargarMinutos(second){
                let txtMinutos;
    
                if(second == -1 && minute != 0){
                    setTimeout(() => {
                        minute --;
                    },500);
                }else if(second == -1 && minute == 0) {
                    setTimeout(() => {
                        minute = 59;
                    },500);
                }
    
                if(minute < 10){
                    txtMinutos = '0'+minute;
                }else{
                    txtMinutos = minute;
                }
    
                $("#minutos").html(txtMinutos);
            }
            setInterval(CargarSegundos, 1000);
        });

        $("#Bpausar").click(function(){
            alert("Click");
        });
    }else{
        console.log("Existe un error de tipo: "+ xhr.status);
    }
};

xhr.send();


/*
$("#BAgregar").click( function () {

    console.log("Click");

    Recogiendo datos del html 
    let TiempoPreparacion = document.getElementById("inputPreparacion").value;
    let TiempoActividad = document.getElementById("inputActividad").value;
    let NumeroSeries = document.getElementById("inputSeries").value;
    let TiempoDescanso = document.getElementById("inputDescanso").value;

    console.log(TiempoPreparacion);
    console.log(TiempoActividad);
    console.log(NumeroSeries);
    console.log(TiempoDescanso);
});
*/

