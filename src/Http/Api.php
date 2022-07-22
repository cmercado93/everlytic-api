<?php

namespace Cmercado93\EverlyticApi\Http;

use GuzzleHttp\Client as GuzzleClient;
use Cmercado93\EverlyticApi\Exceptions\ConfigException;

final class Api
{
    protected $base_url;

    protected $username;

    protected $api_key;

    protected $guzzleClient;

    protected $headers = array(
        'Accept' => 'application/json',
    );

    public function __construct(array $configs)
    {
        if (!isset($configs['base_url'])) {
            throw new ConfigException('base_url not set');
        }

        if (!isset($configs['username'])) {
            throw new ConfigException('username not set');
        }

        if (!isset($configs['api_key'])) {
            throw new ConfigException('api_key not set');
        }

        $this->base_url = $configs['base_url'];

        $this->username = $configs['username'];

        $this->api_key = $configs['api_key'];

        $this->makeClient();
    }

    protected function getHeaders() : array
    {
        return $this->headers;
    }

    protected function getAuth() : array
    {
        return [
            $this->username,
            $this->api_key,
        ];
    }

    protected function makeClient()
    {
        $this->guzzleClient = new GuzzleClient(array(
            'base_uri' => $this->base_url,
        ));
    }

    /**
     * @param $url
     * @param $params
     */
    public function post(string $uri, array $params)
    {
        return $this->guzzleClient->request('post', $uri, array(
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'json' => $params
        ));
    }

    /**
     * @param $url
     */
    public function get(string $uri, array $params = [])
    {
        return $this->guzzleClient->request('get', $uri, array(
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'query' => $params,
        ));
    }

    /**
     * @param $url
     * @param $params
     */
    public function put(string $uri, array $params)
    {
        return $this->guzzleClient->request('put', $uri, array(
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth(),
            'json' => $params
        ));
    }

    /**
     * @param $url
     */
    public function delete(string $uri)
    {
        return $this->guzzleClient->request('delete', $uri, array(
            'headers' => $this->getHeaders(),
            'auth' => $this->getAuth()
        ));
    }

    /**
     * @return GuzzleClient
     */
    public function getClient()
    {
        return $this->guzzleClient;
    }
}
