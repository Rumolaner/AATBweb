<?php

header("Content-type: text/css");

?>
body {
  position: absolute;
  height: 99%;
  min-height: 800px;
  width: 99%;
  background-color: #ffffff;
  color: #000000;
}

header {
  border-botton: 1px solid #00000;
  height: 20%;
  width: 100%;
}

button {
  background-color: white;
  border-color: lightblue;
  margin: 2px;
}

button[type="reset"] {
  background-color: red;
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

article {
  width: 80%;
  height: 100%;
  float: right;
  border: 1px solid black;
}

footer {
  border-top: 3px solid #000000;
  height: 3%;
  width: 100%;
  text-align: right;
}

#headerLogo {
  max-height: 90%;
  float: left;
  margin-right: 20px;
}

#headerTitle {
  position: relative;
  top: 40%;
  z-index: -1;
}

#headerUser {
  border: 1px solid #777777;
  float: right;
  padding: 15px;
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
  width: 400px;
  height: 250px;
  border: 3px double black;
  border-radius: 15px;
  padding: 20px;
}

#loginBox label {
  margin: 10px;
  width: 150px;
  display: block;
  float: left;
}

#loginBox input {
  margin: 10px;
}

#loginBox button {
  margin: 12px;
}

.tabs {
  display: flex;
  flex-wrap: wrap;
  height: 150px;
  width: 100%;
}

.tabs label {
  order: 1;
  display: flex;
  justify-content: start;
  align-items: left;
  padding: 0.5rem 2rem;
  margin-right: 0.2rem;
  cursor: pointer;
  background-color: lightgrey;
  font-weight: bold;
}

.tabs .tab {
  order: 9;
  flex-grow: 1;
  width: 100%;
  height: 100%;
  display: none;
  padding: 1rem;
  background: #fff;
  padding: 20px;
}

.tabs input[type="radio"] {
  display: none;
}

.tabs input[type="radio"]:checked + label {
  background: #fff;
}

.tabs input[type="radio"]:checked + label + .tab {
  display: block;
}

.searchtext {
  width: 100%;
}

.search label {
  background-color: white;
  clear: left;
  width: 150px;
  margin: 0.2rem;
  display: block;
  float: left;
}

.search input {
  padding: 0.5rem 2rem;
  margin: 0.2rem;
  float: left;
}

.search button {
  clear: both;
  margin: 12px;
}

.searchList {
  border: 1px solid black;
  min-width: 250px;
  width: 20%;
  height: 100%;
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.searchList li {
  cursor: pointer;
}

.searchList li:nth-child(even) {
  background: #eee;
}

.searchList li:nth-child(odd) {
  background: #ddd;
}
