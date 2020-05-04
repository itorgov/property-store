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
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_exact_name()
    {
        factory(Property::class)->create([
            'name' => 'Property A',
        ]);
        factory(Property::class)->create([
            'name' => 'Property B',
        ]);

        $response = $this->json('GET', '/api/properties', [
            'name' => 'Property B',
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'name' => 'Property A',
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'name' => 'Property B',
                ],
            ],
        ]);
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_part_of_the_name()
    {
        factory(Property::class)->create([
            'name' => 'Property A',
        ]);
        factory(Property::class)->create([
            'name' => 'Some other name',
        ]);
        factory(Property::class)->create([
            'name' => 'Property B',
        ]);

        $response = $this->json('GET', '/api/properties', [
            'name' => 'operty',
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'name' => 'Some other name',
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'name' => 'Property A',
                ],
                [
                    'name' => 'Property B',
                ],
            ],
        ]);
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_bedrooms()
    {
        $propertyA = factory(Property::class)->create([
            'bedrooms' => 2,
        ]);
        $propertyB = factory(Property::class)->create([
            'bedrooms' => 4,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'bedrooms' => 4,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function bedrooms_count_cannot_be_less_then_one()
    {
        $response = $this->json('GET', '/api/properties', [
            'bedrooms' => 0,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('bedrooms');
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_bathrooms()
    {
        $propertyA = factory(Property::class)->create([
            'bathrooms' => 2,
        ]);
        $propertyB = factory(Property::class)->create([
            'bathrooms' => 4,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'bathrooms' => 4,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function bathrooms_count_cannot_be_less_then_one()
    {
        $response = $this->json('GET', '/api/properties', [
            'bathrooms' => 0,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('bathrooms');
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_storeys()
    {
        $propertyA = factory(Property::class)->create([
            'storeys' => 2,
        ]);
        $propertyB = factory(Property::class)->create([
            'storeys' => 4,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'storeys' => 4,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function storeys_count_cannot_be_less_then_one()
    {
        $response = $this->json('GET', '/api/properties', [
            'storeys' => 0,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('storeys');
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_garages()
    {
        $propertyA = factory(Property::class)->create([
            'garages' => 2,
        ]);
        $propertyB = factory(Property::class)->create([
            'garages' => 4,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'garages' => 4,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function garages_count_cannot_be_less_then_one()
    {
        $response = $this->json('GET', '/api/properties', [
            'garages' => 0,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('garages');
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_minimal_price()
    {
        $propertyA = factory(Property::class)->create([
            'price' => 2300000,
        ]);
        $propertyB = factory(Property::class)->create([
            'price' => 1200000,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'price_from' => 2000000,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function price_from_count_cannot_be_less_then_zero()
    {
        $response = $this->json('GET', '/api/properties', [
            'price_from' => -1,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('price_from');
    }

    /** @test */
    public function everyone_can_get_list_of_properties_filtered_by_maximal_price()
    {
        $propertyA = factory(Property::class)->create([
            'price' => 2300000,
        ]);
        $propertyB = factory(Property::class)->create([
            'price' => 1200000,
        ]);

        $response = $this->json('GET', '/api/properties', [
            'price_to' => 2000000,
        ]);

        $response->assertStatus(200);
        $response->assertJsonMissing([
            'data' => [
                [
                    'id' => $propertyA->id,
                ],
            ],
        ]);
        $response->assertJson([
            'data' => [
                [
                    'id' => $propertyB->id,
                ],
            ],
        ]);
    }

    /** @test */
    public function price_to_count_cannot_be_less_then_zero()
    {
        $response = $this->json('GET', '/api/properties', [
            'price_to' => -1,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('price_to');
    }
}
