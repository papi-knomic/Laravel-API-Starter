<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileViewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "username" => $this->username,
            "location" => $this->location,
            "skills" => $this->skills,
            "profile_picture" => $this->profile_picture,
            "bio" => $this->bio,
            "portfolio" => $this->portfolio,
            "interests" => $this->interests,
            "current_position" => $this->current_position,
            "languages" => $this->languages
        ];
    }
}
