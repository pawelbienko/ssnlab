<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);



class App 
{
    public $name = '';
    
    public $description = '';
    
    public $author = 'Paweł Bieńko';
    
    public $version;
    
    public $defaultPage = array('ssn', 'index');
    
    public $debug = 0;
}
