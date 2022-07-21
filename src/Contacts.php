<?php

namespace Cmercado93\EverlyticApi;

use Cmercado93\EverlyticApi\Entity;

class Contacts extends Entity
{
    public function create(array $data) : array
    {
        return $this->post('/api/2.0/contacts', $data);
    }

    public function createInBulk(array $data) : array
    {
        return $this->post('/api/2.0/contacts', [
            'contacts' => $data
        ]);
    }
}
