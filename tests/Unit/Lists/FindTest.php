<?php

namespace Cmercado93\EverlyticApi\Tests\Unit\Contacts;

use Cmercado93\EverlyticApi\Lists;
use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Tests\TestCase;
use Cmercado93\EverlyticApi\Exceptions\ErrorException;

class FindTest extends TestCase
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
            $res = $i->empty(66660);
            dd($res);
        } catch (ErrorException $e) {
            dd($e->getMessage());
        }

        $this->assertNotEmpty(env('API_KEY'));
    }
}
