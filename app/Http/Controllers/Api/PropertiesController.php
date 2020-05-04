<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Properties\IndexRequest;
use App\Http\Resources\PropertiesResource;
use App\Property;
use Illuminate\Database\Eloquent\Builder;

class PropertiesController extends Controller
{
    public function index(IndexRequest $request): PropertiesResource
    {
        $properties = Property::query()
            ->when($request->has('name'), function (Builder $query) use ($request) {
                $query->nameLike($request->get('name'));
            })
            ->when($request->has('price_from'), function (Builder $query) use ($request) {
                $query->priceFrom($request->get('price_from'));
            })
            ->when($request->has('price_to'), function (Builder $query) use ($request) {
                $query->priceTo($request->get('price_to'));
            })
            ->when($request->has('bedrooms'), function (Builder $query) use ($request) {
                $query->bedrooms($request->get('bedrooms'));
            })
            ->when($request->has('bathrooms'), function (Builder $query) use ($request) {
                $query->bathrooms($request->get('bathrooms'));
            })
            ->when($request->has('storeys'), function (Builder $query) use ($request) {
                $query->storeys($request->get('storeys'));
            })
            ->when($request->has('garages'), function (Builder $query) use ($request) {
                $query->garages($request->get('garages'));
            })
            ->orderBy('name')
            ->get();
        //->paginate(10); Use this instead get() for pagination.

        return new PropertiesResource($properties);
    }
}
