<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth; 
use App\Models\{ Event, EventRegistration };

class EventService
{
    /**
     * Get all events
     * 
     * @return array
     */
    public function getAllEvents()
    {
        return Event::all();
    }

    /**
     * Get event by id
     *
     * @param integer $id
     * @return App\Models\Event
     */
    public function getEventById($id)
    {
        return Event::find($id);
    }

    /**
     * Create or Update an event
     * 
     * @param array $data
     * @return App\Models\Event
     */
    public function createOrUpdateEvent($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $values = [
                'name' => $data['name'],
                'rev_share' => isset($data['rev_share']) ? floatval($data['rev_share']) : 0,
                'balance' => isset($data['balance']) ? floatval($data['balance']) : 0,
            ];
            if (isset($data['id'])) {
                $event = Event::find($data['id']);
                if ($event->update($values)) {
                    return $event;
                }
            } else {
                $event = Event::create($values);
                return $event;
            }
        }

        return null;
    }

    /**
     * Delete an event
     * 
     * @param integer eventId
     * @return boolean
     */
    public function deleteEvent($eventId)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin()) {
            $event = Event::find($eventId);
            $event->users()->detach();
            $event->delete();
        }

        return false;
    }

    /**
     * Register an event
     * 
     * @param array $data
     * @return App\Models\EventRegistration
     */
    public function registerEvent($data)
    {
        $user = Auth::user();
        if ($user->isSuperAdmin() || $user->id == $data['user_id']) {
            $eventRegistration = EventRegistration::create([
                'user_id' => $data['user_id'],
                'event_instance_id' => $data['event_instance_id'],
                'confirmation_number' => $data['confirmation_number'],
            ]);

            return $eventRegistration;
        }

        return null;
    }
}
