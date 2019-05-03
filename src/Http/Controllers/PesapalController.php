<?php

namespace Blessedkono\Pesapal\Http\Controllers;
use Blessedkono\Pesapal\service\Pesapal;

use App\Http\Controllers\Controller;

class PesapalController extends Controller
{
    //

    public function pesapalInit(){
        $params = [];

        $amount =
        $amount = 9;//format amount to 2 decimal places
        $desc = "hello";
        $type ="MERCHANT";
        $reference =444;
        $first_name = "";
        $last_name = "";
        $email = "rett@gmail.com";
        $phonenumber = "0753456475";

        if (!array_key_exists('currency', $params)) {
            if (config('pesapal.currency') != null) {
                $params['currency'] = config('pesapal.currency');
            }
        }

        $params = array_merge($params);


        $token = NULL;

        $consumer_key = config('pesapal.consumer_key');

        $consumer_secret = config('pesapal.consumer_secret');

        $signature_method = new Pesapal\OAuthSignatureMethod_HMAC_SHA1();

        $callback_url = 'https://blessedkono.com';
        $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';


        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
        <PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $amount . "\" Description=\"" . $desc . "\" Type=\"" . $type . "\" Reference=\"" . $reference . "\" FirstName=\"" . $first_name . "\" LastName=\"" . $last_name . "\" Email=\"" . $email . "\" PhoneNumber=\"" . $phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";

        $post_xml = htmlentities($post_xml);

        $consumer = new Pesapal\OAuthConsumer($consumer_key, $consumer_secret);

        $iframe_src = Pesapal\OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);

        $iframe_src->set_parameter("oauth_callback", $callback_url);

        $iframe_src->set_parameter("pesapal_request_data", $post_xml);

        $iframe_src->sign_request($signature_method, $consumer, $token);

        return view('pesapal::pesapal')->with('iframe_src',$iframe_src);
    }

}
