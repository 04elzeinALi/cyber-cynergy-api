<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncidentRequest;
use App\Http\Requests\UpdateIncidentRequest;
use App\Models\Incident;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index(): JsonResponse
    {
        $incidents = Incident::with(['client', 'reporter', 'assignee'])->get();

        return response()->json([
            'message' => 'Incidents retrieved successfully.',
            'data'    => $incidents,
        ]);
    }

    public function store(StoreIncidentRequest $request): JsonResponse
    {
        $incident = Incident::create([
            ...$request->validated(),
            'reported_by_user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => 'Incident created successfully.',
            'data'    => $incident->load(['client', 'reporter']),
        ], 201);
    }

    public function show(Incident $incident): JsonResponse
    {
        return response()->json([
            'message' => 'Incident retrieved successfully.',
            'data'    => $incident->load(['client', 'reporter', 'assignee', 'comments']),
        ]);
    }

    public function update(UpdateIncidentRequest $request, Incident $incident): JsonResponse
    {
        $incident->update($request->validated());

        return response()->json([
            'message' => 'Incident updated successfully.',
            'data'    => $incident,
        ]);
    }

    public function destroy(Incident $incident): JsonResponse
    {
        $incident->delete();

        return response()->json([
            'message' => 'Incident deleted successfully.',
        ]);
    }

    public function assign(Request $request, Incident $incident): JsonResponse
    {
        $request->validate([
            'assigned_to_user_id' => ['required', 'exists:users,id'],
        ]);

        $incident->update([
            'assigned_to_user_id' => $request->assigned_to_user_id,
            'status'              => 'investigating',
        ]);

        return response()->json([
            'message' => 'Incident assigned successfully.',
            'data'    => $incident->load('assignee'),
        ]);
    }

    public function resolve(Incident $incident): JsonResponse
    {
        $incident->update([
            'status'      => 'resolved',
            'resolved_at' => now(),
        ]);

        return response()->json([
            'message' => 'Incident resolved successfully.',
            'data'    => $incident,
        ]);
    }

    public function comments(Incident $incident): JsonResponse
    {
        $comments = $incident->comments()->with('author')->get();

        return response()->json([
            'message' => 'Comments retrieved successfully.',
            'data'    => $comments,
        ]);
    }

    public function addComment(Request $request, Incident $incident): JsonResponse
    {
        $request->validate([
            'body' => ['required', 'string'],
        ]);

        $comment = $incident->comments()->create([
            'user_id' => $request->user()->id,
            'body'    => $request->body,
        ]);

        return response()->json([
            'message' => 'Comment added successfully.',
            'data'    => $comment->load('author'),
        ], 201);
    }
}