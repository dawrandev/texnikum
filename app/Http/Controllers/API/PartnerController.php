<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function getPartners()
    {
        $partners = \App\Models\Partner::all();

        return response()->json([
            'success' => true,
            'message' => 'Partners retrieved successfully',
            'data' => $partners
        ]);
    }
}
