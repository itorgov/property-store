<?php

namespace Tests\Feature;

use App\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetPropertiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function everyone_can_get_list_of_properties()
    {
        $propertyA = factory(Property::class)->create([
            'name' => 'Property A',
            'price' => 1200000,
            'bedrooms' => 2,
            'bathrooms' => 2,
            'storeys' => 2,
            'garages' => 1,
        ]);
        $propertyB = factory(Property::class)->create([
            'name' => 'Property B',
            'price' => 2490000,
            'bedrooms' => 4,
            'bathrooms' => 3,
            'storeys' => 2,
            'garages' => 2,
        ]);

        $response = $this->getJson('/api/properties');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'data' => [
                [
                    'id' => $propertyA->id,
                    'name' => 'Property A',
                    'price' => 1200000,
                    'bedrooms' => 2,
                    'bathrooms' => 2,
                    'storeys' => 2,
                    'garages' => 1,
                ],
                [
                    'id' => $propertyB->id,
                    'name' => 'Property B',
                    'price' => 2490000,
                    'bedrooms' => 4,
                    'bathrooms' => 3,
                    'storeys' => 2,
                    'garages' => 2,
                ],
            ],
        ]);
        $this->assertEquals(2, Property::query()->count());
    }
}
