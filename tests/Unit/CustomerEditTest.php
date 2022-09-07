<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Image;
use Livewire\Livewire;
use App\Models\Customers;
use App\Http\Livewire\CustomerTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerEditTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_livewire_create_is_succesful()
    {
        $this->runSeeder();
        Auth::attempt(['email' => 'a', 'password' => 'a']);

        Livewire::test(CustomerTable::class)
            ->set('customerNewName', 'testuser')
            ->set('customerNewSurname', 'testuser')
            ->set('customerNewEmail', 'tes@test')
            ->set('customerNewPhoneNumber', '05364748102')
            ->call('createCustomer');

        Livewire::test(CustomerTable::class)
            ->set('customerNewName', '')
            ->set('customerNewSurname', '')
            ->set('customerNewEmail', '')
            ->set('customerNewPhoneNumber', '')
            ->call('createCustomer')
            ->assertHasErrors([
                'customerNewName' => 'required',
                'customerNewSurname' => 'required',
                'customerNewEmail' => 'required',
                'customerNewPhoneNumber' => 'required'
            ]);
        Livewire::test(CustomerTable::class)
            ->set('customerNewName', '')
            ->set('customerNewSurname', '')
            ->set('customerNewEmail', 'tes@test')
            ->set('customerNewPhoneNumber', '')
            ->call('createCustomer')
            ->assertHasErrors([
                'customerNewName' => 'required',
                'customerNewSurname' => 'required',
                'customerNewEmail' => 'unique',
                'customerNewPhoneNumber' => 'required'
            ]);

        $this->assertTrue((Customers::orderBy('id', 'desc')->first()->name == 'testuser'));
    }
    public function test_livewire_edit_is_succesful()
    {
        $this->runSeeder();
        $cust = Customers::inRandomOrder()->first();
        Auth::attempt(['email' => 'a', 'password' => 'a']);

        Livewire::test(CustomerTable::class)
            ->set('customerNewName', 'testuser')
            ->set('customerNewSurname', 'testuser')
            ->set('customerNewEmail', 'tes@test')
            ->set('customerNewPhoneNumber', '05364748102')
            ->set('currentCustomer', $cust)
            ->call('editCustomer');

        $this->assertTrue((Customers::whereId($cust->id)->first()->name == 'testuser'));
    }
    public function runSeeder()
    {
        //basic login keys
        \App\Models\User::factory()->has(Image::factory())->create([
            'name' => 'a',
            'email' => 'a',
            'password' => bcrypt('a')

        ]);

        //roles seed
        $arr = ['Admin', 'User', 'Customer', 'Editor'];
        collect($arr)->map(fn ($arre) =>
        \Spatie\Permission\Models\Role::create(['name' => $arre]));

        //seed user and customeer 
        \App\Models\User::factory(50)->has(Image::factory())->create()->map(fn ($user) => $user->assignRole($arr[rand(0, 3)]));
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Customers::factory(50)->has(Image::factory())->create()->map(fn ($customer) => $customer->responsible()->create(['reponsibleById' => User::inRandomOrder()
                ->limit(1)->first()->id]));
            info('50 yeni kayıt eklendi' . $i . '. adım');
        }
    }
}