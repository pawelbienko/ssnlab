<?php



abstract class BaseController 
{
    private $settings = array();
    
    /**
     * An Array of Config Variables
     * 
     * @var array
     */
    
    protected $config;
    
    /**
     * Langugage variable
     * 
     * @var IPManagerLang Language Class
     */
    
    protected $lang;
    
    public function __construct()
    {
        global $CONFIG;
        
        // Load Lang
        //$this->lang = new IPManagerLang();
        
        // Load Configuration
        $this->config = $CONFIG;
        
        //$this->settings = DB::instance()->makeQuery('select REPLACE(setting, ?, ?) as setting, value from tblconfiguration where setting like ?', array('IPManager_', '', '%IPManager_%'))->listArray('setting', 'value');
    }
    
    protected function isPostRequest()
    {
        return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
    }
    
    protected function isAjaxRequest()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');
    }
    
    protected function getRequested($key, $default = '')
    {
        return array_get($_REQUEST, $key, $default);
    }
    
    protected function getAllSettings()
    {
        return $this->settings;
    }
    
    public function getLang()
    {
        return $this->lang;
    }
    
    protected function getSetting($key, $defaultValue)
    {
        if(isset($this->settings[$key]))
        {
            return $this->settings[$key];
        }
        
        return $defaultValue;
    }
}