<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'job_id' => $this->jasa_id,
            'total_people' => $this->total_people,
            'address' => $this->address,
            'status' => $this->status,
            'date' => $this->booking_date,
            'start' => $this->booking_start,
            'end' => $this->booking_end,
            'created_at' => $this->created_at->format('d M Y, H:i')
        ];
    }
}
