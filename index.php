<?php
define('DS', DIRECTORY_SEPARATOR);        
$site_path = realpath(__DIR__).DS;
define('SITE_PATH', $site_path);
       
$config     = file_get_contents(SITE_PATH . 'config.xml');
$configXML  = new SimpleXMLElement($config);

$host       = (string)'mysql:host='.$configXML->db->host;
$hoct       .= ';dbname:'.$configXML->db->dbname;
$username   = (string)$configXML->db->username;
$password   = (string)$configXML->db->password;

try {
    $db = new PDO($host, $username, $password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}
spl_autoload_register('loadClass');

function loadClass($className)
{   
    $file=str_replace('_', DS, $className).'.php';
    
    if (!file_exists($file)) 
    {
    return false;
    }     
    include $file;    
}

try {
    System_Registry :: set('db', $db);
}
catch(Exception $e) {
    echo $e->getMessage();
}
$router = new System_Router();

try {
    $router->setPath(SITE_PATH . 'Controller');
    $router->start();
}
catch(Exception $e) {
    echo $e->getMessage();
}