<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertiesResource;
use App\Property;

class PropertiesController extends Controller
{
    public function index(): PropertiesResource
    {
        $properties = Property::all();

        return new PropertiesResource($properties);
    }
}
