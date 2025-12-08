<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendeeResource;
use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index(Event $event)
    {
        return AttendeeResource::collection(
            $event->attendees()->latest()->paginate()
        );
    }

    public function store(Request $request, Event $event)
    {
        $attendee = $event->attendees()->create([
            'user_id' => 1,
        ]);

        return AttendeeResource::make($attendee);
    }

    public function show(Event $event, Attendee $attendee)
    {
        return AttendeeResource::make($attendee);
    }

    public function destroy(Event $event, Attendee $attendee)
    {
        $attendee->delete();

        return response()->noContent();
    }
}
