/* global selectAnnee, MonthYear, date, menu, burger */


selectAnnee.onchange = function(){
   
    var annee = $('#selectAnnee option:selected').val();
    
    if(annee.length === 4){
    getListeDons(annee);  
    getMt(annee);
    getAssos(annee);
    }else{
        $("#tblLot tbody > tr").remove();
        $("#tblMt tbody > tr").remove();
        $("#tblAsso tbody > tr").remove();
    }
};

document.addEventListener('DOMContentLoaded', function(){
    
    selectAnnee.selectedIndex = 1;
    var annee = $('#selectAnnee option:selected').val();
    
    getListeDons(annee);  
    getMt(annee);
    getAssos(annee);
    
    
    getPromotionJSON("5", "2020");
});

function getListeDons(annee){
    $.ajax({
        url:        '../include/getListeDons.php',
        cache:      false,
        data:       "selectAnnee="+escape(annee),
        datatype:   "html",
        success:    function(html){
                                $("#tblLot tbody > tr").remove();
                                $('#tblLot').append(html);  
        }
    });    
}

function getMt(annee){
    $.ajax({
        url:        '../include/getMtCumul.php',
        cache:      false,
        data:       "selectAnnee="+escape(annee),
        datatype:   "html",
        success:    function(html){
                                $("#tblMt tbody > tr").remove();
                                $('#tblMt').append(html);
        }
    });    
}

function getAssos(annee){
    $.ajax({
        url:        '../include/getAssociations.php',
        cache:      false,
        data:       "selectAnnee="+escape(annee),
        datatype:   "html",
        success:    function(html){
                                $("#tblAsso tbody > tr").remove();
                                $('#tblAsso').append(html);
        }
    });    
}


