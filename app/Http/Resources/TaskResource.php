<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->resource->id,
            'title'=>$this->resource->title,
            'describe'=>$this->resource->describe,
            'status'=> new StatusResource($this->resource->status),
            'expire_date'=>$this->resource->expire_date,
            'created_at'=>$this->resource->created_at,
            'upadted_at'=>$this->resource->updated_at,
        ];
        // return parent::toArray($request);
    }
}
