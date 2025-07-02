# payrexx-php SDK

## Overview

This is the official PHP client library for the Payrexx API, supporting API version **1.0 - 1.11**. It enables easy integration with Payrexx payment services from your PHP applications.

---

## Versioning

- This client library targets **Payrexx API version 1.11**.
- Make sure to use the compatible library version to avoid compatibility issues.
- The current stable release is **2.0.0**, which requires PHP 8.0 or higher.

---

## Requirements

- **PHP version:** 8.0 or higher (recommended from version 2.0.0 onwards)
- **PHP modules:** cURL extension enabled

---

## Installation

### Using Composer (recommended)

If you do not have Composer installed, please visit [https://getcomposer.org/download/](https://getcomposer.org/download/) for installation instructions.

Add Payrexx SDK to your project via Composer:

```bash
composer require payrexx/payrexx
```
Alternatively, add this to your composer.json and run composer update:
- For the latest development version:
    ```JSON
    {
      "require": {
        "payrexx/payrexx": "dev-master"
      }
    }
    ```
- For the stable version 2.0.0:
    ```JSON
    {
      "require": {
        "payrexx/payrexx": "2.0.0"
      }
    }
    ```

This will install the SDK and generate the necessary autoload files.

---

## Quick Start
1. Instantiate the Payrexx client
    ```PHP
    $instance = 'your-instance-name'; // e.g., 'demo' for https://demo.payrexx.com
    $apiSecret = 'your-api-secret';   // Find this in your Payrexx instance admin panel
    
    $payrexx = new \Payrexx\Payrexx($instance, $apiSecret);
    ```

2. Create a model object
    For example, to work with subscriptions:
    ```PHP
    use Payrexx\Models\Request\Subscription;
    
    $subscription = new Subscription();
    $subscription->setId(1);
    ```

3. Call API methods

   For example, to cancel a subscription:
    ```PHP
    try {
        $response = $payrexx->cancel($subscription);
        $subscriptionId = $response->getId();
    } catch (\Payrexx\PayrexxException $e) {
        // Handle errors
        echo 'Error Code: ' . $e->getCode() . PHP_EOL;
        echo 'Error Message: ' . $e->getMessage() . PHP_EOL;
    }
    ```

### Specifying the API Version

The Payrexx PHP SDK constructor supports an optional `$version` parameter that allows you to specify the API version you want to use.

```PHP
$instance = 'your-instance-name';
$apiSecret = 'your-api-secret';

// Specify the API version explicitly (e.g., "1.8")
$apiVersion = '1.8';

$payrexx = new \Payrexx\Payrexx(
    $instance,
    $apiSecret,
    \Payrexx\Communicator::DEFAULT_COMMUNICATION_HANDLER,
    '',           // leave empty if not using a custom API base domain
    $apiVersion   // specify the API version here
);
```
---

## Using Platform Accounts (Custom API Base URL)
If you are working with Platform accounts, you must specify a custom API base domain when instantiating the client.

```PHP
use Payrexx\Communicator;

$apiBaseDomain = 'your.domain.com';

$payrexx = new \Payrexx\Payrexx(
    $instance, 
    $apiSecret, 
    Communicator::DEFAULT_COMMUNICATION_HANDLER,
    $apiBaseDomain
);
```
Notes:

- `$instance` is the subdomain part of your unique domain.
- For example, if your login domain is client.platform.yourcompany.com, then:  
  - `$instance = 'client'`
  - `$apiBaseDomain = 'platform.yourcompany.com'`

---

## Documentation and Support
For detailed information about the API endpoints and data models, please refer to the official Payrexx REST API documentation:
https://developers.payrexx.com/v1.0/reference
