<?php

namespace App\Services;

use App\Models\Event;

class EventService
{

    public function createEvent(array $data)
    {
        return Event::create([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'date' => $data['date'],
        ]);
    }
}
