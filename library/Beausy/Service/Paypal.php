<?php
/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal
{
  public static function factory($interface, $config = array())
  {
    if ($config instanceof Zend_Config)
      $config = $config->toArray();

    /*
     * Convert Zend_Config argument to plain string
     * interface name and separate config object.
     */
    if ($interface instanceof Zend_Config)
    {
      if (isset($interface->params))
        $config = $interface->params->toArray();
      if (isset($interface->interface))
        $interface = (string) $interface->interface;
      else
        $interface = null;
    }

    /*
     * Verify that interface parameters are in an array.
     */
    if (!is_array($config))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception('Interface parameters must be in an array or a Zend_Config object');
    }

    /*
     * Verify that an interface name has been specified.
     */
    if (!is_string($interface) || empty($interface))
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception('Interface name must be specified in a string');
    }

    /*
     * Form full interface class name
     */
    $interfaceNamespace = 'Beausy_Service_Paypal';
    if (isset($config['interfaceNamespace']))
    {
      if ($config['interfaceNamespace'] != '')
        $interfaceNamespace = $config['interfaceNamespace'];
      unset($config['interfaceNamespace']);
    }

    $interfaceName = $interfaceNamespace . '_';
    $interfaceName .=
      str_replace(' ', '_',
                  ucwords(str_replace('_', '', strtolower($interface))));

    /*
     * Load the interface class. Throws an exception
     * if the specified class cannot be loaded.
     */
    if (!class_exists($interfaceName))
    {
      require_once 'Zend/Loader.php';
      Zend_Loader::loadClass($interfaceName);
    }

    /*
     * Create an instance of the interface class.
     * Pass the config to the interface class constructor.
     */
    $paypalInterface = new $interfaceName($config);

    /*
     * Verify that the object created is a descendent
     * of the abstract interface type.
     */
    if (!$paypalInterface instanceof Beausy_Service_Paypal_Abstract)
    {
      /**
       * @see Beausy_Service_Paypal_Exception
       */
      require_once 'Beausy/Service/Paypal/Exception.php';
      throw new Beausy_Service_Paypal_Exception("Interface class '$interfaceName' does not extend Beausy_Service_Paypal_Abstract");
    }

    return $paypalInterface;
  }
}