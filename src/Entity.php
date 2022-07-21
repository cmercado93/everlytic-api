<?php

namespace Cmercado93\EverlyticApi;

use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Http\Api;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Cmercado93\EverlyticApi\Exceptions\ErrorException;

abstract class Entity
{
    protected $http;

    public function __construct(array $configs = [])
    {
        $configs = count($configs) ? $configs : Configs::getConfig();

        $this->http = new Api($configs);
    }

    final protected function post(string $url, array $data = [])
    {
        return $this->exec('POST', $url, $data);
    }

    final protected function get(string $url, array $data = [])
    {
        return $this->exec('GET', $url, $data);
    }

    final protected function exec(string $method, $url, array $data)
    {
        try {
            if ($method == 'GET') {
                return $this->parseResponse($this->http->get($url, $data));
            } elseif ($method == 'POST') {
                return $this->parseResponse($this->http->post($url, $data));
            } else {
                throw new \Exception('Error');
            }
        } catch (RequestException $e) {
            if ($response = $e->getResponse()) {
                $body = json_decode((string)$response->getBody(), 1);

                $e = new ErrorException($body['error'], $body['error']['message'] ?? 'Error', $response->getStatusCode());
            }

            throw $e;
        }
    }

    final protected function parseResponse($response) : array
    {
        $body = json_decode((string)$response->getBody(), 1);

        $res = [];

        if (isset($body['collection'])) {
            $res = $body['collection'];
        } elseif (isset($body['item'])) {
            $res = $body['item'];
        }

        return $res;
    }
}
