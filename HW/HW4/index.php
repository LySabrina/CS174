<?php
use group\hw4\Views\LandingPage;
require_once("src/Views/LandingPage.php");
$controller =
$page = new LandingPage();
$page->renderView();