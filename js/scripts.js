
$(document).ready(function(){

});

function cambiaFinestra(string) {   
    $('#bici').hide("fast").css("visibility","hidden");
    $('#veicoli').hide("fast").css("visibility","hidden");
    $('#prenotazioni').hide("fast").css("visibility","hidden");
    $('#inbox').hide("fast").css("visibility","hidden");
    $('#forum').hide("fast").css("visibility","hidden");
    $('#altro').hide("fast").css("visibility","hidden");
    if($('#Home').is(":visible")){
    	$('#Home').hide("fast").css("visibility","hidden");
        $('#menuEContenuto').show("fast").css("visibility","visible");
    }
    if(string=="vuoto"){
        cambiaContenuto('vuoto');
    }
    if(string=="profilo"){
        $("#Contenuto").load("pages/profilo.php");
    }
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
    if(string=="Home"){
        $("#Home").load("pages/VisualizzaTestoHome.html");
        $('#Home').show("fast").css("visibility","visible");
    }
	if(string=="vuoto"){
        $("#Contenuto").load("pages/htmlvuota.html");
    }
    if(string=="inbox"){
        $("#Contenuto").load("pages/inbox.php");
    }
	if(string=="forum"){
        $("#Contenuto").load("pages/forum.php");
    }
    if(string=="post"){
        $("#Contenuto").load("pages/invioPost.html");
    }
	if(string=="prenincorso"){
        $("#Contenuto").load("pages/prenincorso.php");
    }
    if(string=="prenpassate"){
        $("#Contenuto").load("pages/prenpassate.php");
    }
    if(string=="postazioni"){
        $("#Contenuto").load("pages/postazioni.php");
    }
    if(string=="postazionimaps"){
      $("#Contenuto").load("pages/postazioniMaps.php");     
    }
    if(string=="getDistanceLatLongBici"
    ||string=="getDistanceLatLongPisteCiclabili"
    ||string=="getDistanceLatLongPuntiNoleggio"
    ||string=="getDistanceLatLongColonnine"){
    	var origine = string;
    			$.ajax({
						type : "GET",
						url : "/BasiDati/function/ajaxToSession.php",
						data : {
							origine : origine,
						},
					}).done(function() {
						   $("#Contenuto").load("pages/scegliDistanzaMaps.html");
						   $("#Contenuto").html("<button class='btn btn-primary'>ddddd</button>");
						   
						          
                    $(this).trigger("pagecreate");
					});
    	
 }
    if(string=="pisteciclabili"){
        $("#Contenuto").load("pages/pisteciclabili.php");
    }
    if(string=="puntinoleggio"){
        $("#Contenuto").load("pages/puntinoleggio.php");
    }
	if(string=="classprenbici"){
        $("#Contenuto").load("pages/classprenbici.php");
    }
    if(string=="classprenveicoli"){
        $("#Contenuto").load("pages/classprenveicoli.php");
    }
    if(string=="utilizzomediocol"){
        $("#Contenuto").load("pages/utilizzomediocol.php"); 
    }
    if(string=="visbici"){
        $("#Contenuto").load("pages/visualizzabici.php");
    }
    if(string=="visveicoli"){
        $("#Contenuto").load("pages/visualizzaveicoli.php");
    }
    if(string=="inviomsgpersonale"){
        $("#Contenuto").load("pages/invioMessaggioPersonale.html");
    }
    if(string=="prenbici"){
        $("#Contenuto").load("pages/prenbicihtml.php");
    }
    if(string=="prenveicoli"){
        $("#Contenuto").load("pages/prenveicolihtml.php");
    }
    if(string=="inssegnalaz"){
        $("#Contenuto").load("pages/InsSegnalazhtml.php");
    }
    if(string=="viscolonnine"){
        $("#Contenuto").load("pages/viscolonnine.php");
    }
    if(string=="listautenti"){
        $("#Contenuto").load("pages/ListaUtenti.php");
    }
    if(string=="prenColonnina"){
        $("#Contenuto").load("pages/prenota_colonnina.php");
    }
    if(string=="nuovabici"){
        $("#Contenuto").load("pages/InsertnewBiciHtml.php");
    }
    if(string=="nuovoveicolo"){
        $("#Contenuto").load("pages/InsertnewVeicoliHtml.php");
    }
    if(string=="nuovapostazione"){
        $("#Contenuto").load("pages/InsertnewPostazioniHtml.php");
    }
    if(string=="nuovapista"){
        $("#Contenuto").load("pages/InsertnewPisteHtml.php");
    }
    if(string=="nuovopuntonoleggio"){
        $("#Contenuto").load("pages/InsertnewPuntiNoleggioHtml.php");
    }
    if(string=="nuovacolonnina"){
        $("#Contenuto").load("pages/InsertnewColonnineHtml.php"); 
    }
    
};
