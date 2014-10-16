payrexx-php
===========

VERSIONING
----------

This client API library uses the API version 1.0 of Payrexx.


Getting started with PAYREXX
----------------------------
If you don't already use Composer, then you probably should read the installation guide http://getcomposer.org/download/.

Please include this library via Composer in your composer.json and execute **composer update** to refresh the autoload.php.

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/payrexx/payrexx-php"
        }
    ],
    "require": {
        "payrexx/payrexx": "dev-master"
    }
}
```

1.  Instantiate the payrexx class with the following parameters:
    $instance: Your Payrexx instance name. (e.g. instance name 'demo' you request your Payrexx instance https://demo.payrexx.com
    $apiSecret: This is your API secret which you can find in your instance's administration.

    ```php
        $payrexx = new \Payrexx\Payrexx($instance, $apiSecret);
    ```
2.  Instantiate the model class with the parameters described in the API-reference:
    ```php
        $subscription = new \Payrexx\Models\Request\Subscription();
        $subscription->setId(1);
    ```
3.  Use your desired function:

    ```php
        $response  = $payrexx->cancel($subscription);
        $subscriptionId = $response->getId();
    ```

    It recommend to wrap it into a "try/catch" to handle exceptions like this:
    ```php
        try{
            $response  = $payrexx->cancel($subscription);
            $subscriptionId = $response->getId();
        }catch(\Payrexx\PayrexxException $e){
            //Do something with the error informations below
            $e->getResponseCode();
            $e->getStatusCode();
            $e->getErrorMessage();
        }
    ```


Documentation
--------------

For further information, please refer to the official PHP library reference on https://support.payrexx.com
