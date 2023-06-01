<?php

session_start();
header ('Content-Type: application/javascript');

include "functions/funGetLang.php";
include "classes/clsTranslate.php";

$lang = funGetLang();
$trans = new clsTranslate($lang);

?>
const url = "perform.php";

$(document).ready(function () {
  $('footer').text($('footer').text() + new Date().getFullYear().toString());
  Init();
});

class User {
  constructor(loggedin = false, name = "") {
    this.loggedin = loggedin;
    this.name = name;
  }
}

function Protocol(text) {
  console.log(new Date().toLocaleTimeString("de-DE") + ": " + text);
}

function Message(text) {
  $('#message').html($('#message').html() + text + "<br>");
  $("#message").scrollTop(function() { return this.scrollHeight; });
}

function transSites(sites){
  if (Array.isArray(sites)){
    sites.forEach (function (site, index) {
      if (site['action'] == 'add'){
        $(site['parent']).html($(site['parent']).html() + site['site']);
      } else if (site['action'] == 'delete'){
        $(site['parent']).remove();
      } else if (site['action'] == 'clear'){
        $(site['parent']).html("");
    }
    });
  }
}

function cb_always(data){
  transSites(data['sites']);

  if (typeof data['com'] !== 'undefined'){
    $('#message').text = "";
    for (let i = 0; i < data['com'].length; i++){
      Protocol(data['com'][i]);
      if (data['com'][i].substring(0, 6) == "Error:"){
        alert(data['com'][i])
      }
      if (data['com'][i].substring(0, 6) != "Debug:"){
        $('#message').html($('#message').html() + data['com'][i] + "<br>");
      }
    }
    $("#message").scrollTop(function() { return this.scrollHeight; });
  }
}

function Init() {
  const param = {"a": "init"};
  $.getJSON(url, param)
  .done(function (data) {
    cb_Init(data);
  })
  .fail(function () {
    Protocol("<?php echo $trans->get('error1002') ?>");
  })
  .always(function (data) {
    cb_always(data);
  })
}

function cb_Init(data) {
  if (data['user']['loggedin'] == false) {
    //Neuer user oder user löschen und login anzeigen
    user = new User();
  }
}

function Login() {
  if ($('#mandant').val == ""){
    Message("<?php echo $trans->get('error1'); ?>");
  } else if ($('#username').val() == ""){
    Message("<?php echo $trans->get('error2') ?>");
  } else if ($('#password').val() == ""){
    Message("<?php echo $trans->get('error3') ?>");
  } else {
    const param = {"a": "login", "m": $('#mandant').val(), "u": $('#username').val(), "p": $('#password').val()};
    $.getJSON(url, param)
    .done(function (data) {
      cb_Login(data);
    })
    .fail(function () {
      Protocol("<?php echo $trans->get('error1003') ?>");
    })
    .always(function (data) {
      cb_always(data);
    })
  }
  $('#password').val('');
}

function cb_Login(data) {
  alert("Process data");
}

function Logout() {
  const param = {"a": "logout"};
  $.getJSON(url, param)
  .done(function (data) {
    cb_Logout(data);
  })
  .fail(function () {
    Protocol("<?php echo $trans->get('error1003') ?>");
  })
  .always(function (data) {
    cb_always(data);
  })
}

function cb_Logout(data) {
  user = new User();
}

function Overview(){
  alert("Overview in Vordergrund bringen!");
}

function Cat(){
  alert("Katzen in Vordergrund bringen!");
}

function Litter(){
  alert("Würfe in Vordergrund bringen!");
}
