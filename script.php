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

$(document).on('keypress',function(e) {
  if(e.which == 13) {
    if($('form button[type="button"]').length == 1) {
      $('form button[type="button"]').click();
    }
  }
});

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
      } else if (site['action'] == 'update') {
        $(site['element']).remove();
        $(site['parent']).html($(site['parent']).html() + site['site']);
      } else if (site['action'] == 'delete'){
        $(site['parent']).remove();
      } else if (site['action'] == 'clear'){
        $(site['parent']).html("");
      }

      if (site['hideSiblings'] == true) {
        $(site['element']).siblings().slideUp('slow', (function () { $(site['element']).slideDown('slow');}));
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
    .done(function () {
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

function Logout() {
  const param = {"a": "logout"};
  $.getJSON(url, param)
  .done(function (data) {
    cb_Logout(data);
  })
  .fail(function () {
    Protocol("<?php echo $trans->get('error1005') ?>");
  })
  .always(function (data) {
    cb_always(data);
  })
}

function cb_Logout(data) {
}

function showSite(site){
  if ($('#' + site).length){
    $('#' + site).siblings().slideUp('slow', (function () { $('#' + site).slideDown('slow');}));
  } else {
    const param = {"a": "showSite", "s": site};
    $.getJSON(url, param)
    .done(function (data) {
      cb_Logout(data);
    })
    .fail(function () {
      Protocol("<?php echo $trans->get('error1006') ?>");
    })
    .always(function (data) {
      cb_always(data);
    })

  }
}

function updateSite(site){
  const param = {"a": "updateSite", "s": site};
  $.getJSON(url, param)
  .done(function (data) {
    cb_Logout(data);
  })
  .fail(function () {
    Protocol("<?php echo $trans->get('error1007') ?>");
  })
  .always(function (data) {
    cb_always(data);
  })
}

function deleteTab(id) {
  $("#" + id).next().remove();  //delete label for radio button
  $("#" + id).next().remove();  //delete content div of tab
  $("#" + id).remove();         //delete radio button of tab
}

function getTabNumber(id){
  let counter = 1;
  while($('#' + id + counter).length == 1){
    counter ++;
  }

  return counter;
}

function searchCat() {
  let number = getTabNumber('catTab');

  const param = {"a": "getSearchList", "type": "cat", "number": number, "name": $('#catfiltername').val(), "litter": $('#catfilterlitter').val()};
  $.getJSON(url, param)
  .done(function () {
  })
  .fail(function () {
    Protocol("<?php echo $trans->get('error1004') ?>");
  })
  .always(function (data) {
    cb_always(data);
  })
}
