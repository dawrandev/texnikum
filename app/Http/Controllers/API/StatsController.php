<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatsResource;
use App\Models\Stats;

/**
 * @group Statistics
 * 
 * Managing university statistics and metrics
 */
class StatsController extends Controller
{
    /**
     * Get all statistics
     * 
     * Retrieve a list of all university statistics with their counts and translated titles.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of statistics
     * @responseField data[].id integer Statistic ID
     * @responseField data[].count integer Statistical count/number
     * @responseField data[].title string Statistic title (translated)
     * @responseField data[].created_at string Statistic creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Statistic last update timestamp (ISO 8601 format)
     */
    public function getStats()
    {
        $stats = Stats::all();

        return response()->json([
            'success' => true,
            'message' => 'Statistics retrieved successfully',
            'data'    => StatsResource::collection($stats),
        ]);
    }
}
