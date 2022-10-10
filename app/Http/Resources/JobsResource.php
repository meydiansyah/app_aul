<?php

namespace App\Http\Resources;

use App\Models\Review;
use Illuminate\Http\Resources\Json\JsonResource;

class JobsResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price,
            'start' => $this->timestart,
            'end' => $this->timestop,
            'city' => $this->user->city,
            'rating' => substr(Review::where('jasa_id', '=', $this->id)->average('star'), 0, 3),
            'desc' => $this->desc,
            'status' => $this->user->status->name,
            'image' => $this->portofolio->image,
            'created_at' => $this->created_at->format('d M Y, H:i'),
            'category' => [
                'id' => $this->category_id,
                'name' => $this->category->name,
            ],
            'comment' => CommentResource::collection(Review::where('jasa_id', '=', $this->id)->get())
        ];
    }
}
