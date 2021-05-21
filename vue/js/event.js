/* global listYear */

listYear.onchange = function(){
    //annee = document.getElementById('listYear').options[document.getElementById('listYear').selectedIndex].text;
    annee = $('#selectAnnee option:selected').val();
    //alert("annee"+annee);
    //getListeDons(annee);
    
};


function getListeDons(annee){
    $.ajax({
        type:       'GET',
        url:        'vue/include/getListeDons.php',
        cache:      false,
        data:       "selectAnnee="+escape(annee),
        datatype:   "html",
        success:    function(){           
                                    //$('#selectAnnee').empty();
//                                    $('#rapport').append(html);
                                      $('#selectAnnee option:selected').val(annee);

                                    
            //load()
        }
    });    
};


