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

function Init() {
  const param = {"a": "init"};
  $.getJSON(url, param)
  .done(function (data) {
    cb_Init(data);
  })
  .fail(function () {
    Protocol("Init could not load JSON");
  })
  .always(function (data) {
    cb_always(data);
  })
}

function Protocol(text) {
  console.log(new Date().toLocaleTimeString("de-DE") + ": " + text);
}

function Message(text) {
  $('#message').html($('#message').html() + text + "<br>");
  $("#message").scrollTop(function() { return this.scrollHeight; });
}

function cb_always(data){
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

function cb_Init(data) {
  if (data['loggedin'] == false) {
    //Neuer user oder user löschen und login anzeigen
    user = new User();
    if (!$('#mainLogin').length){
      $('main').html($('main').html() + data['AddSite']);
    }
  }
}

function Login() {
  if ($('#mandant').val == ""){
    Message("Bitte gib einen Mandanten ein!");
  } else if ($('#username').val() == ""){
    Message("Bitte gib Benutzernamen ein!");
  } else if ($('#password').val() == ""){
    Message("Bitte gib das Kennwort ein!");
  } else {
    const param = {"a": "login", "m": $('#mandant').val(), "u": $('#username').val(), "p": $('password').val()};
    $.getJSON(url, param)
    .done(function (data) {
      cb_Login(data);
    })
    .fail(function () {
      Protocol("Init could not load JSON");
    })
    .always(function (data) {
      cb_always(data);
    })
  }
}

function cb_Login(data) {
  alert("Process data");
}
