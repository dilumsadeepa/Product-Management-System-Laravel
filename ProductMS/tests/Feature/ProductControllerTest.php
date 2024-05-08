<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Product;
use App\Models\User;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;


    public function test_store_method_with_valid_data()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        Storage::fake('public');


        $data = [
            'name' => 'Test Product',
            'description' => 'This is a test product description.',
            'price' => 10.99,
            'image' => UploadedFile::fake()->image('test_image.jpg')
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $product = Product::latest()->first();
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['price'], $product->price);
        $this->assertNotNull($product->image);
    }


    public function test_store_method_with_invalid_data()
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'description' => 'This is a test product description.',
            'price' => 10.99,
            'image' => UploadedFile::fake()->image('test_image.jpg')
        ];

        $response = $this->post(route('products.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }


    public function test_update_method_with_authenticated_user()
    {

        $user = User::factory()->create();
        $this->actingAs($user);


        $product = Product::factory()->create();

        $updatedData = [
            'name' => 'Updated Product Name',
            'description' => 'Updated product description.',
            'price' => 15.99,
            'image' => UploadedFile::fake()->image('updated_image.jpg')
        ];

        Storage::fake('public');

        $response = $this->put(route('products.update', $product->id), $updatedData);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $product->refresh();

        $this->assertEquals($updatedData['name'], $product->name);
        $this->assertEquals($updatedData['description'], $product->description);
        $this->assertEquals($updatedData['price'], $product->price);
        $this->assertNotNull($product->image);
    }


    public function test_delete_method_with_authenticated_user()
    {

        $user = User::factory()->create();
        $this->actingAs($user);


        $product = Product::factory()->create();

        Storage::fake('public');

        $response = $this->delete(route('products.destroy', $product->id));

        $response->assertStatus(302);
        $response->assertSessionHas('success');
    }


    public function test_update_method_without_authentication()
    {

        $product = Product::factory()->create();


        $updatedData = [
            'name' => 'Updated Product Name',
            'description' => 'Updated product description.',
            'price' => 15.99,
            'image' => UploadedFile::fake()->image('updated_image.jpg')
        ];

        Storage::fake('public');

        $response = $this->put(route('products.update', $product->id), $updatedData);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }


    public function test_delete_method_without_authentication()
    {

        $product = Product::factory()->create();

        Storage::fake('public');

        $response = $this->delete(route('products.destroy', $product->id));

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
