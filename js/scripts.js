
$(document).ready(function(){

});

function cambiaFinestra(string) {   
    $('#bici').hide("fast").css("visibility","hidden");
    $('#veicoli').hide("fast").css("visibility","hidden");
    $('#prenotazioni').hide("fast").css("visibility","hidden");
    $('#inbox').hide("fast").css("visibility","hidden");
    $('#forum').hide("fast").css("visibility","hidden");
    $('#altro').hide("fast").css("visibility","hidden");
    if(string=="bici"){
        $('#bici').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    }
       if(string=="veicoli"){
        $('#veicoli').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    } 
        if(string=="prenotazioni"){
        $('#prenotazioni').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    }
        if(string=="inbox"){
        $('#inbox').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    }
        if(string=="forum"){
        $('#forum').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    }
        if(string=="altro"){
        $('#altro').show("fast").css("visibility","visible");
        cambiaContenuto('vuoto');
    }
    
};

function cambiaContenuto(string){
	 if(string=="profilo"){
        $("#Contenuto").load("function/profilo.php");
    }
	if(string=="vuoto"){
        $("#Contenuto").load("function/htmlvuota.html");
    }
    if(string=="inbox"){
        $("#Contenuto").load("function/inbox.php");
    }
	if(string=="forum"){
        $("#Contenuto").load("function/forum.php");
    }
	if(string=="prenincorso"){
        $("#Contenuto").load("function/prenincorso.php");
    }
    if(string=="prenpassate"){
        $("#Contenuto").load("function/prenpassate.php");
    }
    if(string=="postazioni"){
        $("#Contenuto").load("function/postazioni.php");
    }
    if(string=="pisteciclabili"){
        $("#Contenuto").load("function/pisteciclabili.php");
    }
    if(string=="puntinoleggio"){
        $("#Contenuto").load("function/puntinoleggio.php");
    }
	if(string=="classprenbici"){
        $("#Contenuto").load("function/classprenbici.php");
    }
    if(string=="classprenveicoli"){
        $("#Contenuto").load("function/classprenveicoli.php");
    }
    
};
