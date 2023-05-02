<?php

header("Content-type: text/css");

?>

body {
  position: absolute;
  height: 99%;
  width: 99%;
  background-color: #ffffff;
  color: #000000;
}

header {
  border-botton: 1px solid #00000;
  height: 20%;
  width: 100%;
}

nav {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  height: 3%;
  width: 100%;
}

main {
  height: 67%;
  width: 100%;
}

footer {
  border-top: 3px solid #000000;
  height: 3%;
  width: 100%;
  text-align: right;
}

#logo {
  max-height: 90%;
  float: left;
  margin-right: 20px;
}

#title {
  position: relative;
  top: 40%;
}

#message {
  background-color: #dddddd;
  color: red;
  height: 4%;
  overflow: scroll;
  overflow-x: hidden;
}

#mainLogin {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

#loginBox {
  width: 350px;
  height: 250px;
  border: 3px double black;
  border-radius: 15px;
  padding: 20px;
}

#loginBox label {
  margin: 12px;
  width: 150px;
  display: block;
  float: left;
}

#loginBox input {
  margin: 12px;
}

#loginBox button {
  margin: 12px;
}
