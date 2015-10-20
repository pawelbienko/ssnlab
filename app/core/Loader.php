<?php
 
/**
 * SplClassLoader implementation that implements the technical interoperability
 * standards for PHP 5.3 namespaces and class names.
 *
 * http://groups.google.com/group/php-standards/web/final-proposal
 *
 *     // Example which loads classes for the Doctrine Common package in the
 *     // Doctrine\Common namespace.
 *     $classLoader = new SplClassLoader('Doctrine\Common', '/path/to/doctrine');
 *     $classLoader->register();
 *
 * @author Jonathan H. Wage <jonwage@gmail.com>
 * @author Roman S. Borschel <roman@code-factory.org>
 * @author Matthew Weier O'Phinney <matthew@zend.com>
 * @author Kris Wallsmith <kris.wallsmith@gmail.com>
 * @author Fabien Potencier <fabien.potencier@symfony-project.org>
 */

class Loader
{
    private $_fileExtension = '.php';
    private $_namespace;
    private $_includePath;
    private $_namespaceSeparator = '\\';
    private $_paths = array('app', 'app/classes', 'app/controllers', 'app/models', 'app/core', 'app/library' );
    
    /**
     * Creates a new <tt>SplClassLoader</tt> that loads classes of the
     * specified namespace.
     * 
     * @param string $ns The namespace to use.
     */
    public function __construct($ns = null, $includePath = null)
    {
        $this->_namespace = $ns;
        $this->_includePath = $includePath;
    }
 
    /**
     * Sets the namespace separator used by classes in the namespace of this class loader.
     * 
     * @param string $sep The separator to use.
     */
    public function setNamespaceSeparator($sep)
    {
        $this->_namespaceSeparator = $sep;
    }
 
    /**
     * Gets the namespace seperator used by classes in the namespace of this class loader.
     *
     * @return void
     */
    public function getNamespaceSeparator()
    {
        return $this->_namespaceSeparator;
    }
 
    /**
     * Sets the base include path for all class files in the namespace of this class loader.
     * 
     * @param string $includePath
     */
    public function setIncludePath($includePath)
    {
        $this->_includePath = $includePath;
    }
 
    /**
     * Gets the base include path for all class files in the namespace of this class loader.
     *
     * @return string $includePath
     */
    public function getIncludePath()
    {
        return $this->_includePath;
    }
 
    /**
     * Sets the file extension of class files in the namespace of this class loader.
     * 
     * @param string $fileExtension
     */
    public function setFileExtension($fileExtension)
    {
        $this->_fileExtension = $fileExtension;
    }
 
    /**
     * Gets the file extension of class files in the namespace of this class loader.
     *
     * @return string $fileExtension
     */
    public function getFileExtension()
    {
        return $this->_fileExtension;
    }
 
    /**
     * Installs this class loader on the SPL autoload stack.
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }
 
    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     */
    public function unregister()
    {
        spl_autoload_unregister(array($this, 'loadClass'));
    }
 
    public static function loadDynamic($basepath, array $classes = array())
    {
        defined('DS') or define('DS', DIRECTORY_SEPARATOR);
        
        $basedir = substr(dirname(__FILE__), 0 , strpos(dirname(__FILE__), DS.'modules'.DS)).DS.'modules'.DS.'addons'.DS;
        
        $instance = new IPManagerLoader;
        $instance->setIncludePath($basedir.$basepath);
        
        if(is_array($classes) and ! empty($classes))
        {
            foreach($classes as $class)
            {
                if(! class_exists($class))
                {
                    $instance->loadClass($class);
                }
            }
        }
        
        //throw new Exception('Models that should be autoloaded has to be specified with an ');
    }
    
    public static function loadModels($basepath, array $classes = array())
    {
        return IPManagerLoader::loadDynamic($basepath, $classes);
    }
    
    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     * @return void
     */
    public function loadClass($className)
    {
        if (null === $this->_namespace || $this->_namespace.$this->_namespaceSeparator === substr($className, 0, strlen($this->_namespace.$this->_namespaceSeparator))) {
            $fileName = '';
            $namespace = '';
            if (false !== ($lastNsPos = strripos($className, $this->_namespaceSeparator))) {
                $namespace = substr($className, 0, $lastNsPos);
                $className = substr($className, $lastNsPos + 1);
                $fileName = str_replace($this->_namespaceSeparator, DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
            }
            $fileName .= $className . $this->_fileExtension;
            
            foreach($this->_paths as $path)
            {
                if(file_exists(($this->_includePath !== null ? $this->_includePath . DIRECTORY_SEPARATOR : '') . $path . DIRECTORY_SEPARATOR . $fileName))      
                {
                    require_once ($this->_includePath !== null ? $this->_includePath . DIRECTORY_SEPARATOR : '') . $path . DIRECTORY_SEPARATOR . $fileName;   
                }
            }
        }
    }
}