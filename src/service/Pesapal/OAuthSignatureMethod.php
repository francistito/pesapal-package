<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 1/24/19
 * Time: 11:23 AM
 */

namespace  Blessedkono\Pesapal\service\Pesapal;

class OAuthSignatureMethod {
    public function check_signature(&$request, $consumer, $token, $signature) {
        $built = $this->build_signature($request, $consumer, $token);
        return $built == $signature;
    }
}