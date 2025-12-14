<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use CanLoadRelationships;

    protected const RELATIONS = [
        'user',
        'attendees',
        'attendees.user',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = $this->loadRelationships(
            Event::query(),
            static::RELATIONS
        );

        return EventResource::collection(
            $query->latest()->paginate()
        );
    }

    public function store(Request $request)
    {
        $event = Event::create([
            ...$request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'start_time' => 'required|date',
                'end_time' => 'required|date|after:start_time',
            ]),
            'user_id' => $request->user()->id,
        ]);

        return EventResource::make(
            $this->loadRelationships($event, static::RELATIONS)
        );
    }

    public function show(Event $event)
    {
        return EventResource::make(
            $this->loadRelationships($event, static::RELATIONS)
        );
    }

    public function update(Request $request, Event $event)
    {
        $event->update(
            $request->validate([
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|nullable|string|max:1000',
                'start_time' => 'sometimes|date',
                'end_time' => 'sometimes|date|after:start_time',
            ])
        );

        return EventResource::make(
            $this->loadRelationships($event, static::RELATIONS)
        );
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response()->noContent();
    }
}
