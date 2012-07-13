<?php
namespace Rfernandez\Pingdom;
/**
 * Created by JetBrains PhpStorm.
 * User: rfernandez
 * Date: 13/07/12
 * Time: 15:21
 * To change this template use File | Settings | File Templates.
 */
use Guzzle\Http\Client as HttpClient;
class Client
{
    private $_mail;
    private $_password;
    private $_token;
    private $_baseUrl;
    private $_config;

    private $_httpClient;

    public function __construct($pMail = null, $pPassword = null, $pToken = null, $pBaseUrl = null)
    {
        $this->setMail($pMail);
        $this->setPassword($pPassword);
        $this->setToken($pToken);
        $this->setBaseUrl($pBaseUrl);
    }

    public function setMail($mail)
    {
        $this->_mail = $mail;
    }

    public function getMail()
    {
        return $this->_mail;
    }

    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function getPassword()
    {
        return $this->_password;
    }

    public function setToken($token)
    {
        $this->_token = $token;
    }

    public function getToken()
    {
        return $this->_token;
    }

    protected function setHttpClient($httpClient)
    {
        $this->_httpClient = $httpClient;
    }

    /**
     * @return HttpClient
     */
    protected function getHttpClient()
    {
        if (is_null($this->_httpClient)) {
            $httpClient = new HttpClient($this->getBaseUrl(), $this->getConfig());

            $this->setHttpClient($httpClient);
        }

        return $this->_httpClient;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->_baseUrl = $baseUrl;
    }

    public function getBaseUrl()
    {
        return $this->_baseUrl;
    }

    public function setConfig($config)
    {
        $this->_config = $config;
    }

    public function getConfig()
    {
        return $this->_config;
    }

    public function getBaseHeaders()
    {
        return array(
            'App-Key' => $this->getToken()
        );
    }
}
