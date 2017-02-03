<?php
namespace Netbull\Mpay24Bundle\Provider;

use Mpay24\Mpay24;
use Mpay24\Mpay24Config;

/**
 * Class mPay24Provider
 * @package Netbull\Mpay24Bundle\Provider
 */
class mPay24Provider
{
    /**
     * @var Mpay24
     */
    private $instance;

    /**
     * mPay24Provider constructor.
     * @param int|string    $merchantID
     * @param string        $soapPassword
     * @param bool          $test
     * @param bool          $debug
     * @param null|string   $proxyHost
     * @param int|null      $proxyPort
     * @param null|string   $proxyUser
     * @param null|string   $proxyPass
     * @param bool          $verifyPeer
     * @param bool          $enableCurlLog
     * @param string        $spid
     * @param null|string   $flexLinkPassword
     * @param bool          $flexLinkTestSystem
     * @param string        $log_file
     * @param string        $log_path
     * @param string        $curl_log_file
     */
    function __construct( $merchantID, $soapPassword, $test, $debug, $proxyHost, $proxyPort, $proxyUser, $proxyPass, $verifyPeer, $enableCurlLog, $spid, $flexLinkPassword, $flexLinkTestSystem, $log_file, $log_path, $curl_log_file )
    {
        $config = new Mpay24Config($merchantID, $soapPassword, $test, $debug, $proxyHost, $proxyPort, $proxyUser, $proxyPass, $verifyPeer, $enableCurlLog, $spid, $flexLinkPassword, $flexLinkTestSystem, $log_file, $log_path, $curl_log_file);
        $this->instance = new Mpay24($config);
    }

    /**
     * @return Mpay24
     */
    public function getInstance()
    {
        return $this->instance;
    }
}