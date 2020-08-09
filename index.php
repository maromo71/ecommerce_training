<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \maromonet\Page;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	//$sql = new \maromonet\DB\Sql();
	//$results = $sql->select("select * from tb_users");

	//echo json_encode($results);
	$page = new Page();
	$page->setTpl("index");

});

$app->run();

 ?>