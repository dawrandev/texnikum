<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatsResource;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    public function getStats()
    {
        $stats = \App\Models\Stats::with('translations')->get();

        return response()->json([
            'success' => true,
            'message' => 'Statistics retrieved successfully',
            'data'    => StatsResource::collection($stats),
        ]);
    }
}
