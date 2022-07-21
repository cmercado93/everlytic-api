<?php

namespace Cmercado93\EverlyticApi\Tests\Unit\Contacts;

use Cmercado93\EverlyticApi\Lists;
use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Tests\TestCase;

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
        try {
            $res = $i->create('Pruebas de API', 'administracion@g2k.com.ar');
            dd($res);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        $this->assertNotEmpty(env('API_KEY'));
    }
}
