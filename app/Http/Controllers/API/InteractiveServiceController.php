<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InteractiveServiceController extends Controller
{
    public function getServices()
    {
        $services = \App\Models\InteractiveService::all();

        return response()->json([
            'success' => true,
            'message' => 'Interactive services retrieved successfully',
            'data'    => $services,
        ]);
    }
}
