<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Partner;

/**
 * @group Partners
 * 
 * Managing partner institutions and organizations
 */
class PartnerController extends Controller
{
    /**
     * Get all partners
     * 
     * Retrieve a list of all partner institutions with their logos and links.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of partners
     * @responseField data[].id integer Partner ID
     * @responseField data[].name string Partner institution name
     * @responseField data[].logo string Partner logo image path
     * @responseField data[].url string|null Partner website URL
     * @responseField data[].created_at string Partner creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Partner last update timestamp (ISO 8601 format)
     */
    public function getPartners()
    {
        $partners = Partner::all();

        return response()->json([
            'success' => true,
            'message' => 'Partners retrieved successfully',
            'data' => $partners
        ]);
    }
}
