<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    use CanLoadRelationships;

    protected const RELATIONS = [
        'user',
    ];

    public function index(Event $event)
    {
        $attendees = $this->loadRelationships(
            $event->attendees()->latest(),
            static::RELATIONS
        );

        return AttendeeResource::collection(
            $attendees->paginate()
        );
    }

    public function store(Request $request, Event $event)
    {
        $attendee = $this->loadRelationships(
            $event->attendees()->create([
                'user_id' => 1,
            ]),
            static::RELATIONS
        );

        return AttendeeResource::make($attendee);
    }

    public function show(Event $event, Attendee $attendee)
    {
        return AttendeeResource::make(
            $this->loadRelationships($attendee, static::RELATIONS)
        );
    }

    public function destroy(Event $event, Attendee $attendee)
    {
        $attendee->delete();

        return response()->noContent();
    }
}
