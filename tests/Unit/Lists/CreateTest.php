<?php

namespace Cmercado93\EverlyticApi\Tests\Unit\Lists;

use Cmercado93\EverlyticApi\Lists;
use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Tests\TestCase;
use Cmercado93\EverlyticApi\Exceptions\ErrorException;

class CreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create()
    {
        Configs::setConfig([
            'base_url' => env('BASE_URL'),
            'username' => env('USERNAME'),
            'api_key' => env('API_KEY'),
        ]);

        $i = new Lists;

        $res = $i->create('Pruebas de API', 'mail@mail.com');

        $this->assertArrayHasKey('id', $res);
    }
}
