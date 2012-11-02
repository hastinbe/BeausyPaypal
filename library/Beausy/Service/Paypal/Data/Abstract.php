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
abstract class Beausy_Service_Paypal_Data_Abstract
{
  //private $_paypal_api_version = '64.0';

  /**
	 * Constructor
	 *
	 * @param 	array 	$options
	 * @return 	void
	 */
	public function __construct(array $options = null)
  {
    if (is_array($options))
      $this->setOptions($options);
  }

  /**
   * Set option value
   *
   * @param array $options An associative array of key and value pairs
   * @return Beausy_Service_Paypal_Data_Abstract
   */
	public function setOptions(array $options)
  {
    $methods = get_class_methods($this);

    foreach ($options as $key => $value)
    {
      $method = 'set' . ucfirst($key);

      if (in_array($method, $methods))
        $this->$method($value);
    }
    return $this;
  }
}