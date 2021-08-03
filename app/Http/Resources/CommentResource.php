<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'author' => $this->user->name,
            'image_author' => $this->user->image,
            'star' => $this->star,
            'content' => $this->comment,
            'created_at' => $this->created_at->format('d M Y, H:i'),
        ];
    }
}
