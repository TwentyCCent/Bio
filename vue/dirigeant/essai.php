<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="demo"> 
    <b>Inline Menu Demonstration<\/b>\n\n            
        <br />This demonstrates the Month Picker menu inlined in a div tag.\n            
        <br />\n            
        <br />\n            
        <div id='InlineMenu'>
        </div>\n        
</div>


<script>
    var EditorConfig = {
        shell: true,
        paths: {
            favorite: "/_make_favourite/",
            media: "/mooshellmedia/",
            addResource: "/_add_external_resource/",
            render: "//fiddle.jshell.net/kidsysco/JeZap/show/?editor_console=",
            saveSettings: "/_editor_options/",
            fork: "/_fork/",
            save: "/_save/",
            update: "/_update/JeZap/",
            loadDependencies: "/_get_dependencies/{lib_id}/",
            showProfile: "/_show_profile/"
        },
        value: {
            html: "<base href=\"https://rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/\">\n<div>\n     <h1>\n            The jQuery UI Month Picker Plugin Version @VERSION<\/h1>\n\n    <p>The jQuery UI Month Picker Plugin was designed to allow users to choose only a month and year when only that input is required. Clicking on the year, allows the user to jump ahead or back 12 years at a time. Clicking anywhere on the page, except on the month picker menu itself, will cause the month picker to hide.<\/p>\n    \n     <h2>\n            Demonstration<\/h2>\n\n        <p class=\"demo\"> <b>Default functionality<\/b>\n\n            <br />This demonstrates the plugin\'s defualt functionality.\n            <br />\n            <br />Choose a Month:\n            <input id=\"IconDemo\" class=\'Default\' type=\"text\" />\n        <\/p>\n        <p class=\"demo button\"> <b>Button Demonstration<\/b>\n            <br />This demonstrates how you can customize every aspect of the open button.  \n            See the <a href=\'http://github.com/KidSysco/jquery-ui-month-picker#button\'>Button documenation<\/a> for details on handeling internationalization\n            <br />\n            <br />No button:\n            <br />\n            <input id=\"NoIconDemo\" type=\"text\" />\n            <br />\n            <br />Image button:\n            <br />\n            <input id=\"ImageButton\" type=\"text\" />\n            <br />\n            <br />Plain HTML button:\n            <br />\n            <input id=\"PlainButton\" type=\"text\" />\n            <br />\n            <br />jQuery UI button:\n            <br />\n            <input id=\"JQButton\" type=\"text\" />\n        <\/p>\n        \n        <p class=\"demo\"> <b>MinMonth and MaxMonth Demonstration<\/b>\n\n            <br />This demonstrates how you can limit the user to chooseing months within a given interval.\n            <br />\n            <br />Future months only:\n            <br />\n            <input id=\"FutureDateDemo\" type=\"text\" />\n            <br />\n            <br />Past months only:\n            <br />\n            <input id=\"PastDateDemo\" type=\"text\" />\n            <br />\n            <br />18 months from today:\n            <br />\n            <input id=\"YearAndAHalfDeom\" type=\"text\" />\n        <\/p>\n        <p class=\"demo\"> <b>Start Year Demonstration<\/b>\n\n            <br />This demonstrates how the plugin will default to the year specified in the text box. Changing the year in the text box will result in a new default year for the chooser and if no date is selected then the default year is the current year.\n            <br />\n            <br />Choose a month:\n            <input id=\"StartYearDemo\" class=\'Default\' type=\"text\" value=\"01/2025\" />\n        <\/p>\n        <p class=\"demo\"> <b>Override Start Year Demonstration<\/b>\n\n            <br />This demonstrates how the MonthPicker can be configured to override the start year default behavior. This MonthPicker will start on 2023 no matter which date is currently selected, even if no date is specified.\n            <br />\n            <br />Choose a month:\n            <input id=\"OverrideStartYear\" type=\"text\" />\n        <\/p>\n        <p class=\"demo\"> <b>Get Month/Year & Validation API Demonstration<\/b>\n\n            <br />This demonstrates API usage for the GetSelectedMonthYear(), GetSelectedYear() and GetSelectedMonth() function calls which will also perform date validation. Clear() will clear the text field and any validation messages.\n            <br />\n            <br />Choose a month:\n            <input id=\"GetYearDemo\" class=\"GetYearDemo\" type=\"text\" value=\"02/2012\" />\n            <br />\n            <br />\n            <button type=\"button\" onclick=\"alert(\$(\'.GetYearDemo\').MonthPicker(\'GetSelectedYear\'));\">Get Year<\/button>\n            <button type=\"button\" onclick=\"alert(\$(\'#GetYearDemo\').MonthPicker(\'GetSelectedMonth\'));\">Get Month<\/button>\n            <button type=\"button\" onclick=\"alert(\$(\'#GetYearDemo\').MonthPicker(\'GetSelectedMonthYear\'));\">Get Month and Year<\/button>\n            <button type=\"button\" onclick=\"\$(\'#GetYearDemo\').MonthPicker(\'Clear\');\">Clear<\/button>\n        <\/p>\n        <p class=\"demo\"> <b>Disable/Enable API Demonstration<\/b>\n\n            <br />This demonstrates API usage for the Enable() and Disable().\n            <br />\n            <br />Choose a month:\n            <input id=\"EnableDisableDemo\" class=\"Default\" type=\"text\" value=\"12/2009\" />\n            <br />\n            <button type=\"button\" onclick=\"\$(\'#EnableDisableDemo\').MonthPicker(\'option\', \'Disabled\', true);\">Disable<\/button>\n            <button type=\"button\" onclick=\"\$(\'#EnableDisableDemo\').MonthPicker(\'option\', \'Disabled\', false);\">Enable<\/button>\n        <\/p>\n        <p class=\"demo\"> <b>Digital Bush Integration Demonstration<\/b>\n\n            <br />This demonstrates how the MonthPicker plugin integrates with the <a href=\"http://digitalbush.com/\" target=\"_new\">Digital Bush Plugin for Input Masking<\/a> as well as the html 5 placeholder attribute to simulate watermarking. Try to type an invalid date and try the Get Month/Year button to fire off validation.\n            <br />\n            <br />Type in a month/year:\n            <br />\n            <input id=\"DigitalBush\" type=\"text\" class=\"digital-bush\" />\n            <br />\n            <br />Type in a month/year:\n            <br />\n            <input id=\"DigitalBushBoth\" type=\"text\" class=\"digital-bush\" placeholder=\"mm/yyyy\" />\n            <br />\n            <br />\n            <button type=\"button\" onclick=\"\$(\'.digital-bush\').MonthPicker(\'Clear\');\">Clear All<\/button>\n            <button type=\"button\" onclick=\"alert(\$(\'#DigitalBushBoth\').MonthPicker(\'GetSelectedMonthYear\'));\">Get Month/Year<\/button>\n        <\/p>\n\n        <p class=\"demo\"> <b>Month Format Demonstration<\/b>\n            <br />This demonstrates how you can display month feedback in a variety of ways. Choose a month format from the dropdown, then click on the input and select a month to see it in that format.\n            <br />\n            <br />\n            Date: <input type=\"text\" id=\"MonthFormat\" class=\'Default\' value=\'12/2015\' style=\'width:150px;\'>\n            <br>\n            <br>\n            Format options:<br>\n            <select id=\"FormatSelect\">\n                <option value=\"mm/yy\">Default - mm/yy<\/option>\n                <option value=\"yy-mm\">ISO 8601 - yy-mm<\/option>\n                <option value=\"M, y\">Short - M, y<\/option>\n                <option value=\"MM, y\">Medium - MM, y<\/option>\n                <option value=\"mm MM, yy\">Full - mm MM, yy<\/option>\n                <option value=\"MM &apos;in the year&apos; yy\">With text - MM \'in the year\' yy<\/option>\n            <\/select>\n        <\/p>\n\n\n        <div class=\"demo\"> <b>Inline Menu Demonstration<\/b>\n\n            <br />This demonstrates the Month Picker menu inlined in a div tag.\n            <br />\n            <br />\n            <div id=\'InlineMenu\'><\/div>\n        <\/div>\n\n        <p class=\"demo\"> <b>jQuery UI Dialog Integration Demonstration<\/b>\n\n            <br />This demonstrates the Month Picker running inside of the jQuery UI Modal Dialog.\n            <br />\n            <br />\n            <button type=\"button\" id=\"LaunchDialog\" onclick=\"\$(\'#Modal\').dialog(\'open\');\">Launch Dialog<\/button>\n        <\/p>\n\n        <div class=\"demo-position\"> <b>.position() Integration Demonstration<\/b>\n\n            <br />This demonstrates the Month Picker integration with the optional .position() plugin.\n        The right aligned input helps to show how the menu will not allow the edges of the window to hide it\'s appearance. The menu will position itself so that it is always visible. The same effect can be seen on every other month picker on this page by scrolling down low enough so that the menu shows above the input instead of below.\n            <p class=\"text-right\">\n            <br />Choose a month:\n            <input id=\"PositionDemo\" type=\"text\" value=\"02/2012\" />\n            <\/p>\n        <\/div>\n        <p class=\"demo\"> <b>HTML 5 Month Input Type Support<\/b>\n\n            <br />This demonstrates how the MonthPicker will work with the HTML 5 Month Input Type. View this section using Chrome to see Google\'s latest implementation in comparison.\n            <br />\n            <br />\n            Jquery UI Month Picker: <input id=\"Html5\" type=\"month\" class=\"\" /> <br /> <br />\n            Chrome Month Picker: <input id=\"ChromeMonthPicker\" type=\"month\" class=\"\" /> \n        <\/p>\n<\/div>\n \n\n\n<div>&nbsp;\n    <br />\n    <br />\n<\/div>\n<div id=\"Modal\">Test:\n    <input id=\"DialogDemo\" class=\'Default\' type=\"text\" />\n<\/div>\n<a href=\"https://github.com/KidSysco/jquery-ui-month-picker\" target=\"_new\"><img style=\"position: absolute; top: 0; right: 0; border: 0;\" src=\"https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png\" alt=\"Fork me on GitHub\"><\/a>",
            js: "// NOTE: Don\'t forget to wrap you code in:\n// \$(document).ready(function() { \$(\'#id\').MonthPicker(...); });\n\n// Default functionality.\n\$(\'.Default\').MonthPicker();\n\n// Hide the icon and open the menu when you \n// click on the text field.\n\$(\'#NoIconDemo\').MonthPicker({ Button: false });\n\n// Create jQuery UI Datepicker\'s default button.\n\$(\"#PlainButton\").MonthPicker({\n    Button: \'<button>...<\/button>\'\n});\n\n// Create a button out of an image. \n// for details on handeling the disabled state see:\n// https://github.com/KidSysco/jquery-ui-month-picker#button\n\$(\"#ImageButton\").MonthPicker({\n    Button: \'<img class=\"icon\" src=\"//rawgit.com/KidSysco/jquery-ui-month-picker/v3.0.0/demo/images/icon.gif\" />\'\n});\n\n// Creates a button out an a JQuery UI button. See:\n// http://github.com/KidSysco/jquery-ui-month-picker#button\n// for details on handeling internationalization.\n\$(\"#JQButton\").MonthPicker({\n    Button: function() {\n        return \$(\"<button>Open<\/button>\").button();\n    }\n});\n\n// Allows 1 months from today (future months only). \n\$(\'#FutureDateDemo\').MonthPicker({ MinMonth: 1 });\n\n// Allows at most 1 month from today (past months only).\n\$(\'#PastDateDemo\').MonthPicker({ MaxMonth: -1 });\n\n// Don\'t allow this month and at most 18 months from today.\n// For detaild on the datatyps you can pass see:\n// http://github.com/KidSysco/jquery-ui-month-picker#minmonth\n\$(\'#YearAndAHalfDeom\').MonthPicker({\n    MinMonth: 0, \n    MaxMonth: \'+2y -6m\' // Or you could just pass 18.\n});\n\n// Start on the year 2023 no matter what date is selected.\n\$(\"#OverrideStartYear\").MonthPicker({ StartYear: 2023 });\n\n// Display an error message if the date is not valid.\n\$(\'#GetYearDemo\').MonthPicker({\n    ValidationErrorMessage: \'Invalid Date!\'\n});\n\n// Apply an input mask which mkase sure the user \n// limits the user to typing a month in the \n//fromat specified in the MonthFormat option.\n\$(\'#DigitalBush\').MonthPicker({ UseInputMask: true });\n\$(\'#DigitalBushBoth\').MonthPicker({\n    UseInputMask: true,\n    ValidationErrorMessage: \'Invalid Date!\'\n});\n\n// The plugin supports the HTML 5 month type out of the box\n// no special setup required.\n\$(\'#Html5\').MonthPicker({\n    ShowIcon: false,\n    StartYear: 2027\n});\n\n// You can control the menu\'s positioning \n// and collision handeling by passing options to the \n// jQuery UI .position() plugin.\n\$(\'#PositionDemo\').MonthPicker({\n    ShowIcon: false,\n    Position: {\n        collision: \'fit flip\'\n    }\n});\n\n// Create an inline menu by calling \n// .MonthPicker(); on a <div> or <span> tag.\n\$(\"#InlineMenu\").MonthPicker({\n    SelectedMonth: \'04/\' + new Date().getFullYear(),\n    OnAfterChooseMonth: function(selectedDate) {\n        // Do something with selected JavaScript date.\n        // console.log(selectedDate);\n    }\n});\n\n\$(\"#FormatSelect\").change(function() {\n   \$(\"#MonthFormat\").MonthPicker(\'option\', \'MonthFormat\',\$(this).val());\n});\n\n\$(\'#Modal\').dialog({\n    autoOpen: false,\n    title: \'MonthPicker Dialog Test\',\n    modal: true\n});\n\n\$(\"h1\").text( \$(\"h1\").text().replace(\'@VERSION\', \$.MonthPicker.VERSION) );",
            css: ".icon {\n    vertical-align: bottom;\n    margin-top: 2px;\n    margin-bottom: 3px;\n    cursor: pointer;\n}\n\n.icon:active {\n    opacity: .5;\n}\n\n.demo.button input {\n    margin-right: 2px;\n}\n\n.demo.button .ui-button-text {\n    padding: .4em .6em;\n    line-height: 0.8;\n}\n\ninput[type=\'text\'] {\n  width: 60px;\n}\n\nbody {\n    margin: 15px 20px;\n}"
        },
        fiddle: {
            id: "265375865",
            slug: "JeZap",
            boilerplate: false
        },
        panels: {
            html: "html",
            js: "javascript",
            css: "css"
        },
        user: {
            id: "None",
            username: ""
        },
        // showHelloBar: false,
        showHelloBar: false,
        currentUser: false,
        isAuthor: false,
        features: {
            toggleSidebar: false
        }
    }

    // translations
    const I18n = {
        editor: {
            panels: {
                result: "Result",
                drag_to_reorder: "Drag tabs to reorder",
                tidy: "Tidy"
            },
            sidebar: {
                toggle_sidebar: "Toggle sidebar"
            },
            groups: {
                placeholder_value: "Assign to groups",
                search_placeholder_value: "Search for groups",
                no_choices_text: "No more groups",
                no_results_text: "No groups found",
                item_select_text: "Press to select",
                you_have_no_groups: "You have no groups"
            }
        }
    }

    const EditorUISettings = {
        // options that user can change
        layout: 1,
        darkTheme: true,
        tabSize: 2,
        matchBrackets: true,
        lineNumbers: true,
        lineWrapping: true,
        keyMap: "default",
        autoCloseTags: true,
        autoCloseBrackets: true,
        indentWithTabs: false,
        codeLinting: true,
        autoRun: EditorConfig.currentUser ? false : false,
        autoRunValid: EditorConfig.currentUser ? true : false,
        autoSave: EditorConfig.currentUser ? true : false,
        clearConsole: false,
        fontSize: 1,
        matchTags: false,
        foldGutter: true,
        reduceHelloBar: false,
        codeHints: false,
        editorConsole: true
    }
</script>
<script>
// Create an inline menu by calling 
// .MonthPicker(); on a <div> or <span> tag.
$("#InlineMenu").MonthPicker({
    SelectedMonth: '04/' + new Date().getFullYear(),
    OnAfterChooseMonth: function(selectedDate) {
        // Do something with selected JavaScript date.
        // console.log(selectedDate);
    }
});

$("#FormatSelect").change(function() {
   $("#MonthFormat").MonthPicker('option', 'MonthFormat',$(this).val());
});

$('#Modal').dialog({
    autoOpen: false,
    title: 'MonthPicker Dialog Test',
    modal: true
});

$("h1").text( $("h1").text().replace('@VERSION', $.MonthPicker.VERSION) );
</script>