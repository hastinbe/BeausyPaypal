<?php
/**
 * @see Zend_Currency
 */
require_once 'Zend/Currency.php';

/**
 *
 * Beausy
 *
 * @author    Beau Hastings <beausy@gmail.com>
 * @copyright Beau Hastings
 * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html}
 *
 */
class Beausy_Service_Paypal_Currency extends Zend_Currency
{
  /**
   * Paypal supported currency
   * @var array
   */
  protected static $_supportedCurrency =
    array('AUD', 'BRL', 'CAD', 'CZK', 'DKK', 'EUR', 'HKD', 'HUF',
          'ILS', 'JPY', 'MYR', 'MXN', 'NOK', 'NZD', 'PHP', 'PLN',
          'GBP', 'SGD', 'SEK', 'CHF', 'TWD', 'THB', 'USD');

  /**
   * Checks if a given currency code is valid
   *
   * @param string $code A three-character currency code
   * @return boolean
   */
  public static function isValid($code)
  {
    return in_array(strtoupper($code), self::$_supportedCurrency);
  }

  /**
   * Retrieves currency supported by Paypal
   *
   * @return array
   */
  public static function getSupportedCurrency()
  {
    return self::$_supportedCurrency;
  }
}