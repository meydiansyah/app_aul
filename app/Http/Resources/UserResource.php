<?php

namespace App\Http\Resources;

use App\Models\Jasa;
use App\Models\Order;
use App\Models\Portofolio;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image,
            'email' => $this->email,
            'gender' => $this->gender,
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'desc' => $this->desc,
            'status' => $this->status->name,
            'created_at' => $this->created_at->format('d M Y, H:i'),
            'jobs' => JobsResource::collection(Jasa::where('user_id', '=', $this->id)->get()),
            'portfolio' => PortfolioResource::collection(Portofolio::where('user_id', '=', $this->id)->get()),
            'transactions' => TransactionResource::collection(Order::where('user_id', '=', $this->id)->get())
        ];
    }
}
