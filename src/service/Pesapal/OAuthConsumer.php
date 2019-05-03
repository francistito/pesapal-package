<?php
/**
 * Created by PhpStorm.
 * User: dontito
 * Date: 1/24/19
 * Time: 11:21 AM
 */

namespace  Blessedkono\Pesapal\service\Pesapal;


class OAuthConsumer {
    public $key;
    public $secret;

    function __construct($key, $secret, $callback_url=NULL) {
        $this->key = $key;
        $this->secret = $secret;
        $this->callback_url = $callback_url;
    }

    function __toString() {
        return "OAuthConsumer[key=$this->key,secret=$this->secret]";
    }
}