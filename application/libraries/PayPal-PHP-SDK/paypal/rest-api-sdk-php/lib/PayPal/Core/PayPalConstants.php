<?php

namespace PayPal\Core;

/**
 * Class PayPalConstants
 * Placeholder for Paypal Constants
 *
 * @package PayPal\Core
 */
class PayPalConstants
{

    const SDK_NAME = 'PayPal-PHP-SDK';
    const SDK_VERSION = '1.11.0';

    /**
     * Approval URL for Payment
     */
    const APPROVAL_URL = 'approval_url';
// https://api.sandbox.paypal.com/
// https://www.sandbox.paypal.com
    const REST_SANDBOX_ENDPOINT = "https://api.paypal.com/";
    const OPENID_REDIRECT_SANDBOX_URL = "https://www.paypal.com";

    const REST_LIVE_ENDPOINT = "https://api.paypal.com/";
    const OPENID_REDIRECT_LIVE_URL = "https://www.paypal.com";
}