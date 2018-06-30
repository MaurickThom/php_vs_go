<?php
require_once "../vendor/autoload.php";
require_once "../config.php";
use views\ListView;

$v = new ListView();
$v->printDocument();
