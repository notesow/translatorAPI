<?php
require_once "../autoloader.php";
use notesow\translatorAPI\HttpClient;

$translatorHttp =  new HttpClient\HttpTranslator();
$translatorHttp->source("en");
$translatorHttp->target("it");
echo $translatorHttp->requestTranslation("hi");