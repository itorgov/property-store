<?php

namespace App\Http\Resources;

use App\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Property $resource
 */
class PropertyResource extends JsonResource
{
    public function __construct(Property $resource)
    {
        parent::__construct($resource);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'price' => $this->resource->price,
            'bedrooms' => $this->resource->bedrooms,
            'bathrooms' => $this->resource->bathrooms,
            'storeys' => $this->resource->storeys,
            'garages' => $this->resource->garages,
        ];
    }
}
