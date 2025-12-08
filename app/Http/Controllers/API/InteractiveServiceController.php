<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\InteractiveService;

/**
 * @group Interactive Services
 * 
 * Managing online services and interactive tools
 */
class InteractiveServiceController extends Controller
{
    /**
     * Get all interactive services
     * 
     * Retrieve a list of all available interactive services with their urls.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of interactive services
     * @responseField data[].id integer Service ID
     * @responseField data[].title string Service title
     * @responseField data[].url string Service URL (link)
     * @responseField data[].created_at string Service creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Service last update timestamp (ISO 8601 format)
     */
    public function getServices()
    {
        $services = InteractiveService::all();

        return response()->json([
            'success' => true,
            'message' => 'Interactive services retrieved successfully',
            'data'    => $services,
        ]);
    }
}
