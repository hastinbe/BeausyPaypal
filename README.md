# Paypal library for Zend Framework 1.x

  A Zend Framework 1.x library for PayPal.

  This library began in February 2010 to process payments for Paypal using Paypal's NVP API. At that
  time the other proposed libraries for the Zend Framework had been inactive or abandoned.

## Installation

  Copy the Beausy directory to your Zend Framework application's library directory.

## Configuration

  Add the following to your application's configuration:

**For Zend_Config_Ini based configurations**

    autoloaderNamespaces.beausy = "Beausy_"

**For Zend_Config_Xml based configurations**

    <autoloaderNamespaces>
        <beausy value="Beausy_" />
    </autoloaderNamespaces>

## Example

    $pp_params = array(
      'username'        => 'paypal_api_username',
      'password'        => 'paypal_api_password',
      // 'certificate'  => APPLICATION_PATH . '/../data/certs/paypal_cert.pem',
      'signature'       => 'paypal_signature',
      'environment'     => 'sandbox',           // or 'live'
      // 'subject'      => '',
      'business'        => 'some@email.com'
    );

    $paypal = Beausy_Service_Paypal::factory('Nvp', $pp_params);

    $credit_card = new Beausy_Service_Paypal_Data_CreditCardDetails(array(
      'type'            => 'CC_TYPE',
      'number'          => 'CC_NUMBER',
      'expirationDate'  => 'CC_EXPIRATION',
      'cvv2'            => 'CC_CVV2',
      //'startDate'     => '',
      //'issueNumber'   => '',
    ));

    $payer_info = new Beausy_Service_Paypal_Data_PayerName(array(
      'firstName' => 'FIRST_NAME',
      'lastName'  => 'LAST_NAME'
    ));

    $address = new Beausy_Service_Paypal_Data_Address(array(
      'street'      => '1 Test St',
      'street2'     => urlencode('Apt #1'), // Optional
      'city'        => 'CITY',
      'state'       => 'ND',
      'countryCode' => 'US',
      'zip'         => '11111',
      'phone'       => '555-555-5555',      // Optional
    ));

    $payment_details = new Beausy_Service_Paypal_Data_PaymentDetails(array(
      'amount'            => '1.00',
      'itemAmount'        => '1.00', // Required if L_AMTn is set in Beausy_Service_Paypal_Data_PaymentDetailsItem
      'shippingAmount'    => '0.00', // If specified you must set itemAmount
      //'handlingAmount'  => '',     // If specified you must set itemAmount
      //'taxAmount'       => '',     // If specified you must set L_TAXAMTn in Beausy_Service_Paypal_Data_PaymentDetailsItem
    ));

    $payment_details_item = new Beausy_Service_Paypal_Data_PaymentDetailsItem(array(
      'itemIndex'       => 0,
      'itemName'        => 'Product Name',
      'itemDescription' => 'Product Description',
      'itemAmount'      => '1.00',
      'itemNumber'      => 'PRODUCTSKU',
      'itemQuantity'    => 1,
      //'itemTaxAmount' => '', // Optional
    ));

    $field_sets = array(
      $credit_card,
      $payer_info,
      $address,
      $payment_details,
      $payment_details_item
    );

    $client_ip = $this->getRequest()->getClientIp();
    $response  = $paypal->doDirectPayment($field_sets, $client_ip, 'Sale');

    var_dump($response);

# License

GNU GPL v2

Copyright (C) 2010 Beau Hastings <beausy@gmail.com>