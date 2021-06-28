


/*
 * MonthYearPicker JavaScript Library v1.0.1
 * http://www.kvcodes.com/
 *  http://www.kvcodes.com/2018/04/simple-javascript-month-year-picker
 * Dual licensed under the MIT or GPL Version 2 licenses.
 */
/* global promo, plus, boutonPromo, listReduc */

function positionInfo(object) {
    var p_elm = object;
    this.getElementLeft = getElementLeft;
    function getElementLeft() {
        var x = 0;
        var elm;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        while (elm !== null) {
            x += elm.offsetLeft;
            elm = elm.offsetParent;
        }
        return parseInt(x);
    }

    this.getElementWidth = getElementWidth;

    function getElementWidth() {
        var elm;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        return parseInt(elm.offsetWidth);
    }

    this.getElementRight = getElementRight;

    function getElementRight() {
        return getElementLeft(p_elm) + getElementWidth(p_elm);
    }

    this.getElementTop = getElementTop;

    function getElementTop() {
        var y = 0;
        var elm;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        while (elm !== null) {
            y += elm.offsetTop;
            elm = elm.offsetParent;
        }
        return parseInt(y);
    }

    this.getElementHeight = getElementHeight;

    function getElementHeight() {
        var elm;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        return parseInt(elm.offsetHeight);
    }

    this.getElementBottom = getElementBottom;

    function getElementBottom() {
        return getElementTop(p_elm) + getElementHeight(p_elm);
    }
}

function CalendarControl() {
    var calendarId = 'CalendarControl';
    var currentYear = 0;
    var currentMonth = 0;
    var currentDay = 0;
    var selectedYear = 0;
    var selectedMonth = 0;
    var selectedDay = 0;
    var months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    var dateField = null;
    function getProperty(p_property) {
        var p_elm = calendarId;
        var elm = null;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        if (elm !== null) {
            if (elm.style) {
                elm = elm.style;
                if (elm[p_property]) {
                    return elm[p_property];
                } else {
                    return null;
                }
            } else {
                return null;
            }
        }
    }
    function setElementProperty(p_property, p_value, p_elmId) {
        var p_elm = p_elmId;
        var elm = null;
        if (typeof (p_elm) === "object") {
            elm = p_elm;
        } else {
            elm = document.getElementById(p_elm);
        }
        if ((elm !== null) && (elm.style !== null)) {
            elm = elm.style;
            elm[ p_property ] = p_value;
        }
    }
    function setProperty(p_property, p_value) {
        setElementProperty(p_property, p_value, calendarId);
    }
    function getDaysInMonth(year, month) {
        return [31, ((!(year % 4) && ((year % 100) || !(year % 400))) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month - 1];
    }
    this.clearDate = clearDate;
    function clearDate() {
        dateField.value = '';
        dateField.focus();
        hide();
    }

    this.setDate = setDate;
    function setDate(year, month, day) {
        if (dateField) {
            if (day < 10) {
                day = "0" + day;
            }
            if (month < 10) {
                month = "0" + month;
            }
            var dateString = month + "/" + year;
            dateField.value = dateString;
            dateField.focus();
            dateField.value += '';
            if (dateField.onchange !== null)
                __doPostBack(dateField.id, '');
            hide();


        }
        //alert(month + year);/////////////////////////////////////////////////////////////
        //Initialisation affichage

        getPromotionJSON(month, year);
        listReduc.selectedIndex = 0;
        
        return;
    }
    this.changeMonth = changeMonth;
    function changeMonth(change) {
        currentMonth += change;
        currentDay = 0;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        } else if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        calendar = document.getElementById(calendarId);
        calendar.innerHTML = calendarDrawTable();
    }
    this.changeYear = changeYear;
    function changeYear(change) {
        currentYear += change;
        currentDay = 0;
        calendar = document.getElementById(calendarId);
        calendar.innerHTML = calendarDrawTable();
    }
    function getCurrentYear() {
        var year = new Date().getYear();
        if (year < 1900)
            year += 1900;
        return year;
    }
    function getCurrentMonth() {
        return new Date().getMonth() + 1;
    }
    function getCurrentDay() {
        return new Date().getDate();
    }
    function calendarDrawTable() {
        var css_class = null;
        var table = "<table cellspacing='0' cellpadding='0' border='0'>";
        table = table + "<tr class='cal_header'>";
        table = table + "  <td colspan='1' class='previous'><a href='javascript:changeCalendarControlYear(-1);'>&lt;</a></td>";
        table = table + "  <td colspan='1' class='title'>" + currentYear + "</td>";
        table = table + "  <td colspan='1' class='next'><a href='javascript:changeCalendarControlYear(1);'>&gt;</a></td>";
        table = table + "</tr>";
        var incm = 0;
        for (var mon = 0; mon < 4; mon++) {
            table += "<tr>";
            for (var mon1 = 0; mon1 < 3; mon1++) {
                if (currentMonth === incm + 1)
                    css_class = 'current';
                else
                    css_class = 'weekday';
                table += "<td><a href='javascript:;' onclick=\"javascript:setCalendarControlDate(" + currentYear + "," + (incm + 1) + ",1)\" class='" + css_class + "'>" + months[incm] + "</a></td>";
                incm++;
            }
            table += "</tr>";
        }
        table = table + "<tr class='cl_header'><th colspan='3' style='padding: 3px;'><a href='javascript:;' onclick='javascript:clearCalendarControl();'>Effacer</a> | <a href='javascript:;' onclick='javascript:hideCalendarControl();'>Fermer</a></td></tr>";
        table = table + "</table>";
        return table;
    }
    this.show = show;
    function show(field, xp, yp) {
        can_hide = 0;
        if (dateField === field) {
            return;
        } else {
            dateField = field;
        }
        if (dateField) {
            try {
                var dateString = new String(dateField.value);
                var dateParts = dateString.split("-");
                selectedDay = 1;
                selectedMonth = parseInt(dateParts[0], 10);
                selectedYear = parseInt(dateParts[1], 10);
            } catch (e) {
            }
        }
        if (!(selectedYear && selectedMonth && selectedDay)) {
            selectedDay = getCurrentDay();
            selectedMonth = getCurrentMonth();
            selectedYear = getCurrentYear();
        }
        currentDay = selectedDay;
        currentMonth = selectedMonth;
        currentYear = selectedYear;
        if (document.getElementById) {
            calendar = document.getElementById(calendarId);
            calendar.innerHTML = calendarDrawTable(currentYear, currentMonth);
            setProperty('display', 'block');
            var fieldPos = new positionInfo(dateField);
            var calendarPos = new positionInfo(calendarId);
            if (xp === 0) {
                var x = fieldPos.getElementLeft();
            } else
                var x = xp;
            if (yp === 0)
                var y = fieldPos.getElementBottom();
            else
                var y = yp;
            setProperty('left', x + "px");
            setProperty('top', y + "px");
            if (document.all) {
                setElementProperty('display', 'block', 'CalendarControlIFrame');
                setElementProperty('left', x + "px", 'CalendarControlIFrame');
                setElementProperty('top', y + "px", 'CalendarControlIFrame');
                setElementProperty('width', calendarPos.getElementWidth() + "px", 'CalendarControlIFrame');
                setElementProperty('height', calendarPos.getElementHeight() + "px", 'CalendarControlIFrame');
            }
        }
        dateField.focus();
    }
    this.hide = hide;
    function hide() {
        if (dateField) {
            setProperty('display', 'none');
            setElementProperty('display', 'none', 'CalendarControlIFrame');
            dateField = null;
        }
    }
    this.visible = visible;
    function visible() {
        return dateField;
    }
    this.can_hide = can_hide;
    var can_hide = 0;
}
var calendarControl = new CalendarControl();
function showCalendarControl(textField, x, y) {
    if (!x) {
        x = 0;
    }
    if (!y) {
        y = 0;
    }
    var field = document.getElementById(textField);
    calendarControl.show(field, x, y);
}
function clearCalendarControl() {
    calendarControl.clearDate();
}
function hideCalendarControl() {
    if (calendarControl.visible()) {
        calendarControl.hide();
    }
}
function setCalendarControlDate(year, month, day) {
    calendarControl.setDate(year, month, day);
}
function changeCalendarControlYear(change) {
    calendarControl.changeYear(change);
}
function changeCalendarControlMonth(change) {
    calendarControl.changeMonth(change);
}
document.write("<iframe  id='CalendarControlIFrame' src='javascript:false;document.open();document.write(\"\");document.close();' frameBorder='0' scrolling='no'></iframe>");
document.write("<div id='CalendarControl'></div>");


function getPromotionJSON(mois, annee, pourcentage) {
    urlFin = "/mois/" + parseInt(mois, 10) + "/annee/" + parseInt(annee, 10)+ "/cent/"+pourcentage;
    $.ajax({
        url: "../../controleur/API/promotionJson.php" + urlFin,
        dataType: 'json',
        success: function (json) {
            // Traiter le json retourné
            
            //alert("Nb de promotions : " + json.data["donnees"]["promotions"].length);
            $("#tblPromo tbody > tr").remove();
            $("#promo > li").remove();
            $("#titlePromo").text("");

            var listIdPromo = [];

            if (json.data["donnees"]["promotions"].length > 0) {
                var dicoAllPromo = new Map();
                var allPromos = "";
                for (var i = 0; i < json.data["donnees"]["promotions"].length; i++) {
                    for (var k = 0; k < json.data["donnees"]["promotions"][i]["lignesPromotion"].length; k++) {
                        allPromos += '<tr><th scope="row">' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["idProduit"] + '</th>';
                        allPromos += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["designation"] + '</td>';
                        allPromos += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["dateDebut"];
                        allPromos += ' au ' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["dateFin"] + '</td>';
                        allPromos += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["prixPromo"] + '</td>';
                        allPromos += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["prixBase"] + '</td>';
                        allPromos += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["pourcentageReduct"] + '%</td><td><input type="checkbox" class="custom-control-input" id=""></td></tr>';
                    }
                }
                dicoAllPromo.set("Tous les produits", allPromos);
                ajouterPromo("Toutes les promotions", dicoAllPromo, "");
                $("#titlePromo").append("Toutes les promotions"+ " > " + "Tous les produits");
            }

            for (var i = 0; i < json.data["donnees"]["promotions"].length; i++) {

                if (listIdPromo.includes(json.data["donnees"]["promotions"][i]["idPromo"]) === false) {
                    var dicoPromo = new Map();

                    var libelle = json.data["donnees"]["promotions"][i]["libelle"];
                    var categ = json.data["donnees"]["promotions"][i]["idFamille"];
                    var listePromo = "";

                    for (var k = 0; k < json.data["donnees"]["promotions"][i]["lignesPromotion"].length; k++) {
                        listePromo += '<tr><th scope="row">' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["idProduit"] + '</th>';
                        listePromo += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["designation"] + '</td>';
                        listePromo += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["dateDebut"];
                        listePromo += ' au ' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["dateFin"] + '</td>';
                        listePromo += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["prixPromo"] + '</td>';
                        listePromo += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["prixBase"] + '</td>';
                        listePromo += '<td>' + json.data["donnees"]["promotions"][i]["lignesPromotion"][k]["pourcentageReduct"] + '%</td><td><input type="checkbox" class="custom-control-input" id=""></td></tr>';
                    }


                    dicoPromo.set(categ, listePromo);
                    
//                    jQuery.each(json.data["donnees"]["promotions"], function(){
//                    if (json.data["donnees"]["promotions"][this]["libelle"] === libelle && json.data["donnees"]["promotions"][this]["idFamille"] !== categ){
//                        categPromo.push(json.data["donnees"]["promotions"][this]["idFamille"]);
//                    }
//                    });
                    for (var j = 0; j < json.data["donnees"]["promotions"].length; j++) {
                        if (json.data["donnees"]["promotions"][j]["libelle"] === libelle && json.data["donnees"]["promotions"][j]["idFamille"] !== categ) {
                            listIdPromo.push(json.data["donnees"]["promotions"][j]["idPromo"]);

                            var listePromoBis = "";
                            for (var k = 0; k < json.data["donnees"]["promotions"][j]["lignesPromotion"].length; k++) {
                                listePromoBis += '<tr><th scope="row">' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["idProduit"] + '</th>';
                                listePromoBis += '<td>' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["designation"] + '</td>';
                                listePromoBis += '<td>' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["dateDebut"];
                                listePromoBis += ' au ' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["dateFin"] + '</td>';
                                listePromoBis += '<td>' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["prixPromo"] + '</td>';
                                listePromoBis += '<td>' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["prixBase"] + '</td>';
                                listePromoBis += '<td>' + json.data["donnees"]["promotions"][j]["lignesPromotion"][k]["pourcentageReduct"] + '%</td><td><input type="checkbox" class="custom-control-input" id=""></td></tr>';
                            }
                            dicoPromo.set(json.data["donnees"]["promotions"][j]["idFamille"], listePromoBis);
                        }
                    }
                    ;

                    ajouterPromo(libelle, dicoPromo, i);

                    //Remplissage au chargement
                    for (const [key, value] of dicoPromo) {
                        $("#tblPromo").append(value);
                    }
                }
            }
        }
    });
}


function ajouterPromo(promoText, dicoPromo, i) {

    //attribut de la méthode
    var categ = promoText.replace(/ /g, "").replace("'", '') + "-collapse";

    //création élément liste container
    var btnPromotion = document.createElement('li');
    btnPromotion.setAttribute('class', 'mb' + i);

    //création button représentant la promotion
    var _button = document.createElement("button");
    _button.setAttribute("class", "btn btn-toggle align-items-center rounded collapsed");
    _button.setAttribute("data-bs-toggle", "collapse");
    _button.setAttribute("data-bs-target", "#" + categ);
    _button.setAttribute("aria-expanded", "false");
    _button.focus();
    _button.data = "hi";
    _button.innerHTML = promoText;
    btnPromotion.append(_button);

    //création div collapse liste (structure de la barre latérale)
    var newDiv = document.createElement("div");
    newDiv.setAttribute("class", "collapse show");
    newDiv.setAttribute("id", categ);

    //création liste catégorie produit
    var liste = document.createElement("ul");
    liste.setAttribute('class', 'btn-toggle-nav list-unstyled fw-normal pb-1 small');

    // Ajout de la liste dans la div
    newDiv.appendChild(liste);

    //Remplissage de la liste
    for (const [key, value] of dicoPromo) {
        var li = document.createElement('li');
        li.setAttribute('class', 'promoCateg');
        // Chaque élément de la liste contient un élément de type lien cliquable
        var a = document.createElement('a');
        a.setAttribute('class', 'link-dark rounded');
        a.setAttribute('href', '#');
        a.onclick = function ()
        {           
            //Au clique sur un lien le tableau se vide et 
            //se remplit des éléments correspondant au lien 
            $("#tblPromo tbody > tr").remove();
            $("#tblPromo").append(value);
            $("#titlePromo").text("");
            $("#titlePromo").append(promoText+ " > " + key);
            //alert(categList[i]);
        };
        li.append(a);
        liste.appendChild(li);
        a.innerHTML = key;
    };
    // Ajout de la div contenant la liste des catégories de produit 
    // contenu par un bouton promotion
    btnPromotion.append(newDiv);
    // Ajout du bouton promotion à la liste des promotions de la barre latérale
    promo.append(btnPromotion);
}

// Onload
document.addEventListener('DOMContentLoaded', function () {
    getPromotionJSON("", "");
});

// Gestion de l'évenement de sélection dans la partie Recherche par pourcentage minimum
listReduc.onchange = function(){
    //alert(pourcentage+" "+mois+" "+annee);  
    var pourcentage = parseInt($('#listReduc option:selected').val().replace("%", ""));
    var monthYear = $('#MonthYear').val().split('/');
    var mois = parseInt(monthYear[0]);
    var annee = parseInt(monthYear[1]);
    //alert($("#titlePromo").text());
    //alert(document.getElementById('tblPromo').innerHTML); 
    getPromotionJSON(mois, annee, pourcentage);

};
