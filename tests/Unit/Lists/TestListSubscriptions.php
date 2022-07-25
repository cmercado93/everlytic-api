<?php

namespace Cmercado93\EverlyticApi\Tests\Unit\Lists;

use Cmercado93\EverlyticApi\Lists;
use Cmercado93\EverlyticApi\Configs;
use Cmercado93\EverlyticApi\Tests\TestCase;
use Cmercado93\EverlyticApi\Others\ListSubscriptionStatus;

class TestListSubscriptions extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_changeContactSubscriptionBulk()
    {
        Configs::setConfig([
            'base_url' => env('BASE_URL'),
            'username' => env('USERNAME'),
            'api_key' => env('API_KEY'),
        ]);

        $i = new Lists;

        $res = $i->changeContactSubscriptionBulk(66660, [
            [
                'list_id'       => 66660,
                'contact_id'    => 86406151,
                'email_status'  => ListSubscriptionStatus::SUBSCRIBED,
            ]
        ]);

        $this->assertTrue($res);
    }

    public function test_list_subscribeContact()
    {
        Configs::setConfig([
            'base_url' => env('BASE_URL'),
            'username' => env('USERNAME'),
            'api_key' => env('API_KEY'),
        ]);

        $i = new Lists;

        $res = $i->subscribeContact(66660, 86406151);

        $this->assertTrue($res);
    }

    public function test_list_unsubscribeContact()
    {
        Configs::setConfig([
            'base_url' => env('BASE_URL'),
            'username' => env('USERNAME'),
            'api_key' => env('API_KEY'),
        ]);

        $i = new Lists;

        $res = $i->unsubscribeContact(66660, 86406151);

        $this->assertTrue($res);
    }
}
