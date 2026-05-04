<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuditRequest;
use App\Http\Requests\UpdateAuditRequest;
use App\Models\Audit;
use Illuminate\Http\JsonResponse;

class AuditController extends Controller
{
    public function index(): JsonResponse
    {
        $audits = Audit::with(['client', 'assignee'])->get();

        return response()->json([
            'message' => 'Audits retrieved successfully.',
            'data'    => $audits,
        ]);
    }

    public function store(StoreAuditRequest $request): JsonResponse
    {
        $audit = Audit::create($request->validated());

        return response()->json([
            'message' => 'Audit created successfully.',
            'data'    => $audit->load(['client', 'assignee']),
        ], 201);
    }

    public function show(Audit $audit): JsonResponse
    {
        return response()->json([
            'message' => 'Audit retrieved successfully.',
            'data'    => $audit->load(['client', 'assignee']),
        ]);
    }

    public function update(UpdateAuditRequest $request, Audit $audit): JsonResponse
    {
        $audit->update($request->validated());

        return response()->json([
            'message' => 'Audit updated successfully.',
            'data'    => $audit,
        ]);
    }

    public function destroy(Audit $audit): JsonResponse
    {
        $audit->delete();

        return response()->json([
            'message' => 'Audit deleted successfully.',
        ]);
    }

    public function complete(Audit $audit): JsonResponse
    {
        $audit->update([
            'status'       => 'completed',
            'completed_at' => now(),
        ]);

        return response()->json([
            'message' => 'Audit completed successfully.',
            'data'    => $audit,
        ]);
    }
}