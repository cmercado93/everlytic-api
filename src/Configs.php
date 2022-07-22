<?php

namespace Cmercado93\EverlyticApi;

use Cmercado93\EverlyticApi\Exceptions\ConfigException;

class Configs
{
    static $configs = [];

    public static function setConfig(array $configs) : void
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

        static::$configs = $configs;
    }

    public static function getConfig() : array
    {
        return static::$configs;
    }
}
