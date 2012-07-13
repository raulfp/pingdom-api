<?php
namespace Rfernandez\Pingdom;
/**
 * Created by JetBrains PhpStorm.
 * User: rfernandez
 * Date: 13/07/12
 * Time: 15:34
 * To change this template use File | Settings | File Templates.
 */

use Guzzle\Http\Client as HttpClient;
use Guzzle\Http\Message\Request;
use Guzzle\Http\RequestInterface;
class Check extends Client
{
    public function checks($pLimit = 25000, $pOffset = 0)
    {
        $headers = array_merge($this->getBaseHeaders(), array('limit' => $pLimit, 'offset' => $pOffset));
        $httpClient = $this->getHttpClient();
        /* @var $request Request */
        $request = $httpClient->get('checks');
        $request->setHeaders(array_merge($request->getHeaders()->getAll(), $headers));
        $request->setAuth($this->getMail(), $this->getPassword());

        return json_decode($request->send()->getBody(true))->checks;
    }
}
