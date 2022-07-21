<?php

namespace Cmercado93\EverlyticApi;

use Cmercado93\EverlyticApi\Entity;
use Cmercado93\EverlyticApi\Exceptions\ErrorException;
use Cmercado93\EverlyticApi\Others\ListSubscriptionStatus;

class Lists extends Entity
{
    public function create(string $name, string $ownerEmail, array $data = []) : array
    {
        $data = array_merge($data, [
            'name' => $name,
            'owner_email' => $ownerEmail,
        ]);

        return $this->post('/api/2.0/lists', $data);
    }

    public function findAll(array $data = []) : array
    {
        return $this->get('/api/2.0/lists', $data);
    }

    public function findById(int $id) : array
    {
        try {
            return $this->get('/api/2.0/lists/' . $id);
        } catch (ErrorException $e) {
            if ($e->getCode() == 404) {
                return [];
            }

            throw $e;
        }
    }

    public function empty(int $id) : bool
    {
        $res = $this->post('/api/2.0/list_actions/empty/' . $id);

        return empty($res);
    }

    public function suscribeContact(int $listId, int $contactId, string $emailStatus = ListSubscriptionStatus::SUBSCRIBED, string $mobileStatus = null) : bool
    {
        $data = [
            'list_id' => $listId,
            'contact_id' => $contactId,
            'email_status' => $emailStatus,
            'mobile_status' => $mobileStatus,
        ];

        $res = $this->post('/api/2.0/list_subscriptions/' . $listId, $data);

        return empty($res);
    }
}
