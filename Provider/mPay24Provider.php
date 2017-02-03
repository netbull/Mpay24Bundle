<?php
namespace Netbull\Mpay24Bundle\Provider;

use Mpay24\Mpay24;

use Symfony\Component\HttpFoundation\RequestStack;

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
     * @var null|\Symfony\Component\HttpFoundation\Request
     */
    private $request;

    /**
     * @var string
     */
    private $locale;

    /**
     * mPay24Provider constructor.
     * @param RequestStack  $requestStack
     * @param               $defaultLocale
     * @param array         $options
     */
    function __construct( RequestStack $requestStack, $defaultLocale, array $options )
    {
        $this->instance = new Mpay24($options);

        $this->request  = $requestStack->getCurrentRequest();
        $this->locale   = ( $this->request ) ? $this->request->getLocale() : $defaultLocale;
    }

    /**
     * @return Mpay24
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @param array $options
     * @return \Mpay24\Responses\CreatePaymentTokenResponse
     */
    public function createToken( array $options = [] )
    {
        $defaultOptions = [ 'language' => strtoupper($this->locale) ];
        $options = array_merge($defaultOptions, $options);

        $tokenData = $this->instance->token('CC', $options);

        return $tokenData;
    }
}