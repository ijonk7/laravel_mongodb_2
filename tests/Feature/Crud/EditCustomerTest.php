<?php

namespace Tests\Feature\Crud;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EditCustomerTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function edit_customer_page()
    {
        $user = User::factory()->create();
        Storage::fake('customer');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $responseCreate = $this->actingAs($user)->post('/create-customer', [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'hobby' => $this->faker->randomElements(['art', 'basketball', 'chess', 'fashion', 'video gaming', 'photography', 'music', 'dance', 'jogging', 'swimming'], 3),
            'date_of_birth' => $this->faker->date(),
            'photo' => $file,
            'age' => $this->faker->numberBetween(17, 70),
            'status' => $this->faker->randomElements(['single', 'married', 'divorce'], 1),
            'vehicle' => $this->faker->randomElement(['motorcycle', 'car', 'bike']),
            'address' => $this->faker->address(),
        ]);

        $customer = Customer::first();
        $response = $this->actingAs($user)->get('/edit-customer/' . $customer->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function edit_customer_success()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();
        Storage::fake('customer');
        $file = UploadedFile::fake()->image('avatar.jpg');

        $responseCreate = $this->actingAs($user)->post('/create-customer', [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'hobby' => $this->faker->randomElements(['art', 'basketball', 'chess', 'fashion', 'video gaming', 'photography', 'music', 'dance', 'jogging', 'swimming'], 3),
            'date_of_birth' => $this->faker->date(),
            'photo' => $file,
            'age' => $this->faker->numberBetween(17, 70),
            'status' => $this->faker->randomElements(['single', 'married', 'divorce'], 1),
            'vehicle' => $this->faker->randomElement(['motorcycle', 'car', 'bike']),
            'address' => $this->faker->address(),
        ]);

        $customer = Customer::first();

        Storage::fake('customer');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $responseUpdate = $this->actingAs($user)->put('/edit-customer', [
            'idCustomer' => $customer->id,
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'hobby' => $this->faker->randomElements(['art', 'basketball', 'chess', 'fashion', 'video gaming', 'photography', 'music', 'dance', 'jogging', 'swimming'], 3),
            'date_of_birth' => $this->faker->date(),
            'photo' => $file,
            'age' => $this->faker->numberBetween(17, 70),
            'status' => $this->faker->randomElements(['single', 'married', 'divorce'], 1),
            'vehicle' => $this->faker->randomElement(['motorcycle', 'car', 'bike']),
            'address' => $this->faker->address(),
        ]);

        $responseUpdate->assertSessionHasNoErrors();
        $responseUpdate->assertRedirect(route('dashboard'));
    }

    /**
     * @test
     * @dataProvider fieldData
     * */
    public function edit_customer_error_when_a_field_is_not_provided(array $values, string $expected)
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->put('/edit-customer', $values);
        $response->assertSessionHasErrors($expected);
    }

    public function fieldData()
    {
        return [
            [[
                // 'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'name'],
            [[
                'name' => 'Dariana Morar',
                // 'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'email'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'hobby'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                // 'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'date_of_birth'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                // 'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'age'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                // 'status' => 'single',
                'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'status'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                // 'vehicle' => 'car',
                'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'vehicle'],
            [[
                'name' => 'Dariana Morar',
                'email' => 'brenden03@example.net',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'hobby' => 'fashion,swimming,dance',
                'date_of_birth' => '1988-08-04',
                'photo' => 'https://via.placeholder.com/640x480.png/0044ff?text=Mrs.+Faye+Trantow+accusantium',
                'age' => 55,
                'status' => 'single',
                'vehicle' => 'car',
                // 'address' => '2913 Kyla Square Suite 538 Port Eveline, ND 16002-3333',
            ], 'address'],
        ];
    }
}
