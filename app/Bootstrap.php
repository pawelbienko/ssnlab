<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);
 
class Bootstrap {     
  
    public static function app($class) { 
        
        try {
            $config = new $class();

            if (array_get($_GET, 'debug_mode', 0) == 1) {
                Session::set('debug_mode', 1);
            }

            if ($config->debug == 1 || Session::get('debug_mode', 0) == 1) {
                error_reporting(E_ALL ^ E_NOTICE);
                ini_set('display_errors', 1);
            } else {
                error_reporting(0);
                ini_set('display_errors', 0);
            }

            list($defaultModpage, $defaultAction) = $config->defaultPage;

            $modpage = array_get($_GET, 'page', $defaultModpage);
            $action = array_get($_GET, 'action', $defaultAction);
            
            $controller = sprintf('%sController', ucfirst($modpage));
            if (!class_exists($controller)) {
                throw new Exception(sprintf('Can not locate controller %s', ucfirst($controller)));
            }

            $object = new $controller();

            if (!is_callable(array($object, $action))) {
                throw new Exception(sprintf('Method %s from the controller %s is not callable', $action, $controller));
            }

            $return = call_user_func(array($object, $action));
             
            if ($return instanceof View && !$return->isRendered()) {
               $return->render();
               
            } elseif ($return instanceof Model) {
                
                echo Response::make()->json($return->toArray())->display();
            
            } elseif ($return instanceof BackPropagation) {
                       
              $return->display();
              
            }elseif ($return instanceof Redirect) {
                header('Location: ' . $return->getUrl());
               
            } elseif ($return instanceof View && $return->isClean()) {
                
            } elseif (is_string($return) || ($return instanceof View && $return->isRendered())) {
               
                echo View::make('adminarea/base.tpl')
                        ->with(array(
                            'addon' => $config,
                            'content' => $return
                        ))
                        ->render();

                Session::clear('flash');
            } else {
                throw new Exception('This is not the correct response format!');
            }
        } catch (Exception $e) {
            echo $e->getMessage();

            Session::clear('flash');
        }
    }

    protected static function performQuery($file) {
        $dirname = dirname(__FILE__);

        $query = file_get_contents($dirname . $file);
        $queries = explode(';', $query);

        foreach ($queries as $query) {
            $result = mysql_query($query);

            $results[] = $result;
        }

        return $results;
    }

}
