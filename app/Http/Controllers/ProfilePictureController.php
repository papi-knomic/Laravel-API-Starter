<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadProfilePictureRequest;
use App\Http\Resources\ProfilePictureResource;
use App\Jobs\ProfilePictureJob;
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
//     * @return JsonResponse
     */
    public function store(UploadProfilePictureRequest $request)
    {
        $request->validated();
        $file = $request->file('image');

        $url = 'https://api.cloudinary.com/v1_1/dkz1u13eu/image/upload?upload_preset=ml_default';
        $filePath = $file->getRealPath();
        $base64 = base64_encode( file_get_contents( $filePath ) );

        $response = Http::post( $url, [
            'file' => "data:{$file->getClientMimeType()};base64,{$base64}",
            'multiple' => true,
        ]);
        if ( $response->failed() ){
            return Response::errorResponse();
        }

        $body = json_decode($response->body(), true);

        ProfilePictureJob::dispatchAfterResponse( $body );

        return Response::successResponse('Profile Picture updated successfully', 201);
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
     * Remove the specified resource from storage.
     *
     * @param ProfilePicture $profilePicture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

    }
}
