var btnAbrirPopup = document.getElementById("btn-abrir-popup"),
    overlay = document.getElementById("overlay"),
    popup = document.getElementById("popup"),
    btnCerrarPopup = document.getElementById("btn-cerrar-popup"),
    btnEditar = document.getElementById("btn_editar"),
    Texto = document.getElementById("NombrePupup"),
    BtnAgregar = document.getElementById("BAgregar"),
    Parrafo = document.getElementById("Parrafo");
    
btnAbrirPopup.addEventListener('click', function(){
    Texto.innerHTML = "Crear Tabata";
    BtnAgregar.innerText = "Agregar";
    Parrafo.innerHTML = "Cuando se cree la tabata podra colocar los ejercicios";
    overlay.style.visibility = "visible";
    popup.style.display = "block";
    InputId.style.display = "none";
});
 
btnCerrarPopup.addEventListener('click', function(){
    overlay.style.visibility = "hidden"
    popup.style.display = "none";
});

function EditarTabata(){
    Texto.innerHTML = "Editar Tabata";
    BtnAgregar.innerText = "Actualizar";
    overlay.style.visibility = "visible";
    popup.style.display = "block";
    Parrafo.innerHTML = "";
 
    $("#nametabata").removeAttr("required");
    $("#inputPreparacion").removeAttr("required");
    $("#inputActividad").removeAttr("required");
    $("#inputSeries").removeAttr("required");
    $("#Cantidad").removeAttr("required");
    $("#inputDescanso").removeAttr("required");
 
    $("#Form").attr("action", "../control/action/act_updateTabata.php");

}
/*
btnEditar.addEventListener('click', function(){
  
});
*/