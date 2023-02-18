<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserSocialRequest;
use App\Http\Resources\SocialResource;
use App\Models\UserSocial;
use App\Traits\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index( Request $request ) : JsonResponse
    {
        $user = $request->user();
        $socials = $user->socials;
        $socials = SocialResource::collection($socials);

        return Response::successResponseWithData($socials);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserSocialRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserSocialRequest $request) :JsonResponse
    {
        $fields = $request->validated();
        $user = auth()->user();

        foreach ($request->input('platforms') as $platformData) {
            $existingSocial = $user->socials()->where('platform', $platformData['name'])->first();

            if ($existingSocial) {
                // update existing social
                $existingSocial->update(['url' => $platformData['url']]);
            } else {
                // create new social
                $user->socials()->create([
                    'platform' => $platformData['name'],
                    'url' => $platformData['url'],
                ]);
            }
        }

        $socials = $user->socials;
        $socials = SocialResource::collection($socials);

        return Response::successResponseWithData($socials, 'Socials updated', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param UserSocial $userSocial
     * @return Response
     */
    public function show(UserSocial $userSocial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param UserSocial $userSocial
     * @return Response
     */
    public function update(Request $request, UserSocial $userSocial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UserSocial $userSocial
     * @return Response
     */
    public function destroy(UserSocial $userSocial)
    {
        //
    }
}
