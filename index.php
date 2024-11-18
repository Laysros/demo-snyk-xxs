<?php
require_once ('db.php');

session_start();

if(isset($_POST['Submit'])){
    $username = $_POST['Username'];

    if(login($username, $_POST['Password'])) {
        $_SESSION['user'] = $username;
        header("Location: profile.php");
        exit;

    } else {
        $_SESSION['msg'] = 'Login failed!';
        header("Location: index.php");
        exit;
    }
}
?>

<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Materialize CSS text only template</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Materialize CSS">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body class="mdl-demo">
    <nav class="color-primary">
      <div class="nav-wrapper">
        <a href="#" class="brand-logo">Secure File Storage</a>
      </div>
    </nav>  
    <div class="tab-bar  color-primary--dark">
      <a href="#overview" class="layout__tab is-active">Overview</a>
      <a href="#features" class="layout__tab">Features</a>
      <a href="#features" class="layout__tab">Details</a>
      <a href="#features" class="layout__tab">Technology</a>
      <a href="#features" class="layout__tab">FAQ</a>
      <button class="btn-floating btn-large waves-effect waves-light red" id="add">
        <i class="material-icons" role="presentation">add</i>
        <span class="visuallyhidden">Add</span>
      </button>
    </div>

<div class="container" style="margin-top:90px;">
		<div class="row">
			<div class="col s12 m6 offset-m3">
			
			
		<div class="card-panel z-depth-5">
		<h4 class="center"> Please sign in</h4>	 
<div class="row">
    
        <?php
            if (isset($_SESSION['msg'])) {
        ?>
                    <div class="alert card red white-text">
                        <div class="card-content">
                            <p><i class="material-icons">report</i><span>Warning:</span> <?php echo $_SESSION['msg']; ?></p>
                        </div>
                    </div>
        <?php 
                    session_unset();
            }
        ?>


  <form class="col s12 m12" method="POST" action="/index.php" id="loginform">
    <div class="row">
      <div class="input-field col s12 m12">
        <i class="mdi-action-account-circle prefix"></i>
        <input id="icon_prefix" type="text" class="validate" name="Username">
        <label for="icon_prefix">Username</label>
      </div>
      
        <div class="input-field col s12 m12">
        <i class="fa fa-unlock-alt prefix"></i>
        <input id="icon_password" type="password" class="validate" name="Password">
        <label for="icon_password">Password</label>
      </div>
    
        
    </div>
  </form>
   
</div><!--row-->
 <button class="btn waves-effect waves-light center" type="submit" name="Submit" value="Submit" form="loginform">Submit
    <i class="fa fa-sign-in right"></i>
  </button>
</div><!--card-->



    <footer class="page-footer">
      <div class="row">
        <div class="col s3">
          <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
          <h6 class="mdl-mega-footer--heading">Features</h6>
          <ul class="mdl-mega-footer--link-list">
            <li><a href="#">About</a></li>
            <li><a href="#">Terms</a></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">Updates</a></li>
          </ul>
        </div>
        <div class="col s3">
          <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
          <h6 class="mdl-mega-footer--heading">Details</h6>
          <ul class="mdl-mega-footer--link-list">
            <li><a href="#">Spec</a></li>
            <li><a href="#">Tools</a></li>
            <li><a href="#">Resources</a></li>
          </ul>
        </div>
        <div class="col s3">
          <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
          <h6 class="mdl-mega-footer--heading">Technology</h6>
          <ul class="mdl-mega-footer--link-list">
            <li><a href="#">How it works</a></li>
            <li><a href="#">Patterns</a></li>
            <li><a href="#">Usage</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Contracts</a></li>
          </ul>
        </div>
        <div class="col s3">
          <input class="mdl-mega-footer--heading-checkbox" type="checkbox" checked>
          <h6 class="mdl-mega-footer--heading">FAQ</h6>
          <ul class="mdl-mega-footer--link-list">
            <li><a href="#">Questions</a></li>
            <li><a href="#">Answers</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>