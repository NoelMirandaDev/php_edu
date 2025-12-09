<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private const ALLOWED_RELATIONS = [
        'user',
        'attendees',
        'attendees.user',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        foreach (self::ALLOWED_RELATIONS as $relation) {
            $query->when(
                $this->shouldIncludeRelation($request, $relation),
                fn ($q) => $q->with($relation)
            );
        }

        return EventResource::collection($query->latest()->paginate());
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
            'user_id' => 1
        ]);

        return EventResource::make($event);
    }

    public function show(Event $event)
    {
        return EventResource::make($event->load('user', 'attendees'));
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

        return EventResource::make($event);
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return response()->noContent();
    }

    protected function shouldIncludeRelation(Request $request, string $relation): bool
    {
        $include = $request->query('include');

        if (!$include) {
            return false;
        }

        $relations = array_map('trim', explode(',', $include));

        return in_array($relation, $relations);
    }
}
