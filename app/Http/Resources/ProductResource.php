<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function stockStatus($quantity){
        $status = "";
        if($quantity != 0){
            if($quantity > 10) {
                $status = "stock available!!!";
            }else{
                $status = "stock is almost out of stock!!!";
            }
        }else{
            $status = "Out of Stock!";
        }
        return $status;
    }

    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "show_price" => $this->price." mmk",
            "stock" => $this->stock,
            "stock_status" => $this->stockStatus($this->stock),
            "date" => $this->created_at->format("M d, Y"),
            "time" => $this->created_at->format("H : I a"),
           // "owner" => $this->user->name
            "owner" => new UserResource($this->user),
            "photos" => PhotoResource::collection($this->photos)
        ];
    }
}
