<?php

require_once __DIR__ . '/../lib/paylineSDK.php';

class Payline extends paylineSDK {

    public function __construct($merchant_id, $access_key, $proxy_host, $proxy_port, $proxy_login, $proxy_password, $environment, $logPath) {
        parent::__construct($merchant_id, $access_key, $proxy_host, $proxy_port, $proxy_login, $proxy_password, $environment, $logPath);
    }

}

?>
