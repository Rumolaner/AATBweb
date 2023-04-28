$(document).ready(function () {
  $('footer').text($('footer').text() + new Date().getFullYear().toString());
  Init();
});

function GetSite(site) {
  $.getJSON("perform.php")
  .done(function (data) {
    cb_GetSite(data);
  })
  .fail(function () {
    Protocol("GetSite could not load JSON");
  })
}

function cb_GetSite() {
  console.log("seite geladen");
}

class User {
  constructor(loggedin = false, name = "") {
    this.loggedin = loggedin;
    this.name = name;
  }
}

function Init() {
  $.getJSON("perform.php")
  .done(function (data) {
    cb_Init(data);
  })
  .fail(function () {
    Protocol("Init could not load JSON");
  })
//  .always(function () {
//    console.log("always");
//    console.log(user);
//  })
}

function Protocol(text) {
  console.log(new Date().toLocaleTimeString("de-DE") + ": " + text);
}

function cb_Init(data) {
  console.log("Init");
  console.log(data);

  if (data['loggedin'] == false) {
    //Neuer user oder user löschen und login anzeigen
    user = new User();
    if (!$('#mainLogin').length){
      GetSite("login");
    }
  }
}
