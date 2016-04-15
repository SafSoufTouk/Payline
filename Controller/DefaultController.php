<?php

namespace pxCore\PaylineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use pxCore\PaylineBundle\Model\Payline\Payline;

class DefaultController extends Controller {

    public function indexAction() {
        $paylineConfig = $this->getParameter('payline_config');
//        $payline = new Payline($paylineConfig['MERCHANT_ID'], $paylineConfig['ACCESS_KEY'], $paylineConfig['PROXY_HOST'], $paylineConfig['PROXY_PORT'], $paylineConfig['PROXY_LOGIN'], $paylineConfig['PROXY_PASSWORD'], $paylineConfig['ENVIRONMENT'], null);

        $payline=  $this->get('px_core_payline.service');
        return $this->render('pxCorePaylineBundle:Default:index.html.twig');
    }

}
