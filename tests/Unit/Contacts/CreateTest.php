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

        $res = $i->create([
            "email" => "juanperez@mail.com",
            "on_duplicate" => "update",
            "list_id" => [
                "66660" => "subscribed",
            ],
        ]);

        $this->assertArrayHasKey('id', $res);
        $this->assertIsInt($res['id']);
    }

    public function test_createInBulk()
    {
        Configs::setConfig([
            'base_url' => env('BASE_URL'),
            'username' => env('USERNAME'),
            'api_key' => env('API_KEY'),
        ]);

        $i = new Contacts;

        $res = $i->createInBulk([
            [
                "contact_email" => "juanperez@mail.com",
                "on_duplicate" => "update",
                "list_id" => [
                    "66660" => "subscribed",
                ],
            ],
        ]);

        $expected = [
            0 => [
                'data' => [],
            ],
        ];

        $this->assertArraySubset($expected, $res);
    }
}
