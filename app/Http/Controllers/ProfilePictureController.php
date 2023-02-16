<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadProfilePictureRequest;
use App\Http\Resources\ProfilePictureResource;
use App\Models\ProfilePicture;
use App\Traits\Response;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfilePictureController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(UploadProfilePictureRequest $request)
    {
        $request->validated();
        $file = $request->file('image');

        // Open the file for reading
        $file_handle = fopen($file->getRealPath(), 'r');

        // Create a unique public ID for the image
        $public_id = uniqid();

        // Set up the Cloudinary API URL for uploading images
        $url = 'https://api.cloudinary.com/v1_1/' . config('cloudinary.cloud_name') . '/image/upload';

        // Make the request to the Cloudinary API
        $response = Http::withHeaders([
            'Content-Type' => 'multipart/form-data',
        ])->withOptions([
            'verify' => false
        ])->attach('file', $file_handle, $file->getClientOriginalName())
            ->post($url, [
                'public_id' => $public_id,
                'upload_preset' => config('cloudinary.upload_preset'), // Optional, if you have an upload preset
                'secure' => false,// Set secure to false to use HTTP instead of HTTPS
            ]);

        var_dump($response->body());

//        // Get the public URL of the uploaded image
//        $public_url = $response['secure_url'];
//
//        // Do something with the public URL (e.g. save it to a database)
//
//        // Return a response to the user
//        return response()->json(['url' => $public_url]);
    }

    /**
     * Display the specified resource.
     *
     * @param ProfilePicture $profilePicture
     * @return JsonResponse
     */
    public function show(ProfilePicture $profilePicture)
    {
        $profilePictureResource = new ProfilePictureResource($profilePicture);

        return Response::successResponseWithData($profilePictureResource);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProfilePicture $profilePicture
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProfilePicture $profilePicture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilePicture $profilePicture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProfilePicture $profilePicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePicture $profilePicture)
    {
        //
    }
}
