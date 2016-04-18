# Payline
Payline bundle: Symfony integration for Payline payment system

Authors
-------

* Safwen Toukabri <safwen.toukabri@proxym-it.com>

Installation
------------

### Download the bundle using composer

```
$ composer require pxcore/payline "dev-master"
```
Composer will install the bundle to your project's vendor/pxcore/payline directory.

### Enable the bundle in the kernel:

```
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new pxCore\PaylineBundle\pxCorePaylineBundle(),
        // ...
    );
}
```

### Configure payline parameters

```
parameters:
    # Payline config
    payline_config.merchant_id: "XXXXXXXXXXXXXX"
    payline_config.access_key: "XXXXXXXXXXXXXXXXXXXX"
    payline_config.proxy_host: ""
    payline_config.proxy_port: ""
    payline_config.proxy_login: ""
    payline_config.proxy_password: ""
    payline_config.environment: "HOMO"
    payline_config.log_path: /var/www/my_project/app/logs/testPayline.log	# to edit
```

Usage
-----

```
// Create a new instance of the php "paylineSDK"
$payline = $this->get('px_core_payline.service');

// Just for example
$payline->returnURL = $this->generateAbsoluteUrl('company_payment_payline_finish');
$payline->notificationURL = $this->generateAbsoluteUrl('company_payment_payline_notification');
$payline->cancelURL = $this->generateAbsoluteUrl('company_payment');

// COMMAND REFERENCE (must be unique)
$commandRef = 'ref-01102222-003';   // just for example
//VERSION
$array['version'] = "3";  // WS_VERSION
// PAYMENT
$totalToPay = 250;   // example: 250 €
$array['payment']['amount'] = $totalToPay * 100;  // PAYMENT AMOUNT (Multiply by 100 because the value 100 = 1 €)
        
$array['payment']['currency'] = "978";  // CURRENCY (Euro)
$array['payment']['action'] = "100";    // AUTORISATION (100), AUTHORISATION_AND_VALIDATION (101) and VALIDATION (201) 
$array['payment']['mode'] = "CPT";  // PAYMENT_MODE (CPT: Cash payment)
// ORDER
$array['order']['ref'] = $commandRef;    // COMMAND REFERENCE
$array['order']['amount'] = $totalToPay * 100;    // COMMAND AMOUNt (usually the same as the payment amount)
$array['order']['currency'] = "978";  // CURRENCY (Euro)
// CONTRACT NUMBER
$array['payment']['contractNumber'] = "1234567";    // CONTRACT_NUMBER
// EXECUTE PAYMENT
$response = $payline->doWebPayment($array);
```

This class enables the creation of SOAP messages and other specific classes that handle requests and responses, and use the payline API features. For example: doWebPayment, getWebPaymentDetails. For more details:
* [Payline-kit-php](https://support.payline.com/hc/fr/articles/200995867-Kit-d-int%C3%A9gration-PHP)

Enjoy!




