<?php/** * @see Beausy_Service_Paypal_Data_Abstract */require_once 'Beausy/Service/Paypal/Data/Abstract.php';/** * * Beausy * * @author    Beau Hastings <beausy@gmail.com> * @copyright Beau Hastings * @license   GNU GPL version 2 {@link http://www.gnu.org/licenses/gpl-2.0.html} * *//** * Introduced in Version 69.0 */class Beausy_Service_Paypal_Data_PaymentRequestDetailsItem extends Beausy_Service_Paypal_Data_Abstract{  const ITEMCATEGORY_DIGITAL  = 'Digital';  const ITEMCATEGORY_PHYSICAL = 'Physical';  /**   * Payment number   */  private $_paymentNumber = 0;  /**   * Payment details item index   * @var integer   */  private $_itemIndex = 0;  /**   * Item category.   * @var string   */  private $_itemCategory;  /**   * Item name   * @var string   */  private $_itemName;  /**   * Item description   * @var string   */  private $_itemDescription;  /**   * Cost of item   * @var string   */  private $_itemAmount;  /**   * Item number   * @var string   */  private $_itemNumber;  /**   * Item quantity   * @var integer   */  private $_itemQuantity;  /**   * Item sales tax   * @var string   */  private $_itemTaxAmount;  /**   * Set the payment number   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setPaymentNumber($value)  {    $this->_paymentNumber = (int) $value;    return $this;  }  /**   * Retrieve the payment number   * @return string   */  public function getPaymentNumber()  {    return $this->_paymentNumber;  }  /**   * Set the payment details item index   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemIndex($value)  {    $value = (int) $value;    $this->_itemIndex = $value;    return $this;  }  /**   * Retrieve the payment details item index   * @return string   */  public function getItemIndex()  {    return $this->_itemIndex;  }  /**   * Set item category   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemCategory($value)  {    if ($value != self::ITEMCATEGORY_DIGITAL &&        $value != self::ITEMCATEGORY_PHYSICAL)    {      require_once 'Beausy_Service_Paypal_Data_Exception.php';      throw new Beausy_Service_Paypal_Data_Exception("Item category must be '" . self::ITEMCATEGORY_DIGITAL . "' or '" . self::ITEMCATEGORY_PHYSICAL . "'");    }    $this->_itemCategory = $value;    return $this;  }  /**   * Retrieve item name   * @return string   */  public function getItemCategory()  {    return $this->_itemCategory;  }  /**   * Set item name   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemName($value)  {    $this->_itemName = $value;    return $this;  }  /**   * Retrieve item name   * @return string   */  public function getItemName()  {    return $this->_itemName;  }  /**   * Set item description   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemDescription($value)  {    $this->_itemDescription = $value;    return $this;  }  /**   * Retrieve item description   * @return string   */  public function getItemDescription()  {    return $this->_itemDescription;  }  /**   * Set cost of item   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemAmount($value)  {    $this->_itemAmount = $value;    return $this;  }  /**   * Retrieve cost of item   * @return string   */  public function getItemAmount()  {    return $this->_itemAmount;  }  /**   * Set item number   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemNumber($value)  {    $this->_itemNumber = $value;    return $this;  }  /**   * Retrieve item number   * @return  string   */  public function getItemNumber()  {    return $this->_itemNumber;  }  /**   * Set item quantity   *   * @param   integer   $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemQuantity($value)  {    $this->_itemQuantity = (int) $value;    return $this;  }  /**   * Retrieve item quantity   * @return integer   */  public function getItemQuantity()  {    return $this->_itemQuantity;  }  /**   * Set item sales tax   *   * @param   string  $value   * @return  Beausy_Service_Paypal_Data_PaymentRequestDetailsItem   */  public function setItemTaxAmount($value)  {    $this->_itemTaxAmount = $value;    return $this;  }  /**   * Retrieve item sales tax   * @return string   */  public function getItemTaxAmount()  {    return $this->_itemTaxAmount;  }  /**   * Returns this class as an array   *   * @return array   */  public function toArray()  {    $array = array();    // Optional fields (key=partial PayPal field name, value=internal variable name)    $optional = array(      'ITEMCATEGORY' => '_itemCategory',      'NAME'         => '_itemName',      'DESC'         => '_itemDescription',      'AMT'          => '_itemAmount',      'NUMBER'       => '_itemNumber',      'QTY'          => '_itemQuantity',      'TAXAMT'       => '_itemTaxAmount'    );    // Apply optional options and append item index number to each key as required by the PayPal API    foreach($optional as $option => $value)    {      if (isset($this->$value))      {        $key = sprintf('L_PAYMENTREQUEST_%d_%s%d', $this->paymentNumber, $option, $this->_itemIndex);        $array[$key] = $this->$value;      }    }    return $array;  }}