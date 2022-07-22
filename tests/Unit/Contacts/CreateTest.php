<?php

namespace Cmercado93\EverlyticApi\Tests\Unit\Contacts;

use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Contacts;
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

        $i = new Contacts;
        try {
            $res = $i->create([
                "email" => "juanperez@mail.com",
                "on_duplicate" => "update",
                "list_id" => [
                    "66660" => "subscribed",
                ],
            ]);
            dd($res);
        } catch (ErrorException $e) {
            dd($e->getMessage());
        }
    }
}
