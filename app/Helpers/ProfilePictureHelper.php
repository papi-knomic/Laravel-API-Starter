<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

if ( !function_exists('deleteCloudinaryImage') ) {
    function deleteCloudinaryImage( string $public_id ) {

        $api_secret = config('cloudinary.api_secret');
        $timestamp = Carbon::now()->timestamp;
        $payload = "public_id=$public_id&timestamp=$timestamp";

        // Generate the signature using SHA-256
        $signature = hash('sha256', $payload . $api_secret);
        $url = "https://api.cloudinary.com/v1_1/dkz1u13eu/image/destroy";
        $response = Http::withoutVerifying()->post( $url, [
            'public_id' => $public_id,
            'api_key' => config('cloudinary.api_key'),
            'timestamp' => $timestamp,
            'signature' => $signature
        ]);
        Log::info('Upload', json_decode($response->body(), true));
        return json_decode($response->body());
    }
}
