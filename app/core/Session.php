<?php

/* * ********************************************************************
 * 
 *
 *  CREATED BY MODULESGARDEN       ->        http://modulesgarden.com
 *  AUTHOR                         ->       dominik@modulesgarden.com
 *  CONTACT                        ->       contact@modulesgarden.com
 *
 *
 *
 * This software is furnished under a license and may be used and copied
 * only  in  accordance  with  the  terms  of such  license and with the
 * inclusion of the above copyright notice.  This software  or any other
 * copies thereof may not be provided or otherwise made available to any
 * other person.  No title to and  ownership of the  software is  hereby
 * transferred.
 *
 *
 * *********************************************************************/

/**
 * Session Wrapper
 *
 * @author Dominik Gacek <dominik@modulesgarden.com>
 * @link http://modulesgarden.com ModulesGarden - Top Quality Custom Software Development
 * @license http://www.modulesgarden.com/terms_of_service
 */

class Session 
{
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = '')
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }
    
    public static function clear( $key )
    {
        unset( $_SESSION[$key] );
    }
}