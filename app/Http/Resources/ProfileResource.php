<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "username" => $this->username,
            "verified" => $this->email_verified_at,
            "location" => $this->location,
            "skills" => $this->skills,
            "profile_picture" => $this->profilePicture->url ?? null,
            "bio" => $this->bio,
            "portfolio" => $this->portfolio,
            "interests" => $this->interests,
            "current_position" => $this->current_position,
            "languages" => $this->languages,
            "github_url" => $this->github_url,
            'socials' => SocialResource::collection($this->socials),
            ];
    }
}
