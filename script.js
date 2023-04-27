$(document).ready(function () {
  $('footer').text($('footer').text() + new Date().getFullYear().toString());

  Call_Init();

});

class User {
  constructor(loggedin = false, name = "") {
    this.loggedin = loggedin;
    this.name = name;
  }
}

function Call_Init() {
  $.getJSON("perform.php")
  .done(function (data) {
    Init(data);
  })
  .fail(function () {
    Protocol("Init could not load JSON");
  })
  .always(function () {
    console.log("always");
    console.log(user);
  })
}

function Protocol(text) {
  console.log(new Date().toLocaleTimeString("de-DE") + ": " + text);
}

function Init(data) {
  console.log("Init");
  console.log(data);

  if (data['loggedin'] == false) {
    //Neuer user oder user löschen und login anzeigen
    user = new User();
  }
}
