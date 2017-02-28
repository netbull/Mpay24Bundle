Mpay24Bundle
============
This is Symfony bundle which works with [mpay24.com](https://www.mpay24.com/web/) payments.

[![Build Status](https://travis-ci.org/netbull/Mpay24Bundle.svg?branch=master)](https://travis-ci.org/netbull/Mpay24Bundle)<br>
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e6ac2225-8adf-4d41-868c-3b48644d11cc/big.png)](https://insight.sensiolabs.com/projects/e6ac2225-8adf-4d41-868c-3b48644d11cc)

Dependencies
============
- [Mpay24](https://github.com/mpay24/mpay24-php) 

Installation
============

Step 1: Download the bundle
---------------------------

Type the following command in the Terminal or add it manually to the composer.json
```console
$ composer require netbull/mpay24-bundle
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new Netbull\Mpay24Bundle\NetbullMpay24Bundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Configure the Bundle
----------------------------

1. Option 1

    create a configuration file `app/config/netbull_mpay24.yml` folder and include it in `app/config/config.yml`
     ```yaml
     imports:
         ...
         - { resource: netbull_mpay24.yml }     
     ```
    
2. Option 2
    
    if you want to have separate configuration for the different environments like Prod and Dev, you need to create config file for each of the
     `app/config/netbull_mpay24_prod.yml` and `app/config/netbull_mpay24_dev.yml` and include them in the corresponding config files
    
     `app/config/config_prod.yml`
    ```yaml
     imports:
         ...
         - { resource: netbull_mpay24_prod.yml }     
     ```
    
     `app/config/config_dev.yml`
    ```yaml
     imports:
         ...
         - { resource: netbull_mpay24_dev.yml }     
     ```
     
Usage
=====

the registered service is `netbull.provider.mpay24`

Using directly the SDK Api
--------------------------

in controller can be used with `$this-get('netbull.provider.mpay24')->getInstance()`

Creating token for credit card payment
--------------------------------------

```php
$paymentProvider = $this-get('netbull.provider.mpay24');
$tokenData = $paymentProvider->createToken()
```

The payment provider automatically tries to detect the current Locale from the request object if the language is not specified in the options

Further reading
===============
A short demo implementation guide is available at https://docs.mpay24.com/docs/get-started</br>
Documentation is available at https://docs.mpay24.com/docs.
