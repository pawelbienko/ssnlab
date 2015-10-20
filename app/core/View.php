<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);



class View {

    private $_smarty;
    private $rendered = 0;
    private $clean = 0;
    
    protected $_viewFile;
        
    public function __construct($file = null, array $data = array()) 
    {
        $directory = dirname(dirname(__FILE__));
        
        $this->_smarty = new Smarty();

        $this->_smarty->caching = false;
 
        if(starts_with(@$templates_compiledir, '/'))
        {
            $this->_smarty->compile_dir  = $templates_compiledir;
        }
        else
        {
            $this->_smarty->compile_dir  = $directory.'/templates_c';
        }
        $this->_viewFile = $directory.'/templates/'.$file;
        
        $this->with($data);
    }
    
    public function __toString() 
    {
        return $this->render();
    }
    
    public static function make($file = null, array $data = array())
    {
         
        return new View($file, $data);
    }
    
    public function with(array $data = array())
    {
        if(is_array($data) and !empty($data))
        {
            foreach($data as $key => $value)
            {
                $this->_smarty->assign($key, $value);
            }
        }
       
        return $this;
    }
    
    public function setClean()
    {
        $this->clean = 1;
    }
    
    public function isClean()
    {
        return ($this->clean == 1);
    }
    
    public function isRendered()
    {
        return ($this->rendered == 1);
    }
    
    public function render()
    {
        $this->rendered = 1;
        
        return $this->_smarty->display($this->_viewFile);
    }
}