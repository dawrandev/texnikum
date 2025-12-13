<?php

namespace App\Http\Requests;

// This file kept for backward compatibility with older imports
// It now defines a lightweight alias class `VideoRequest` that extends
// the canonical `VideoStoreRequest` defined in `VideoStoreRequest.php`.

class VideoRequest extends VideoStoreRequest
{
    // intentionally empty - serves as a BC alias
}
