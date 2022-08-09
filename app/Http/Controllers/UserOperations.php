<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\Responsible;
use Illuminate\Auth\Events\Registered;

class UserOperations extends Controller
{
    public function createUserRequest(RegisterRequest $request)
    {
        $this->login($this->createUser($request));
        event(new Registered(auth()->user()));
        return redirect()->route('dashboard');
    }
    public function loginUserRequest(LoginRequest $request)
    {
        $this->login($request);
        return redirect()->route('dashboard');
    }
    public function createUser($data)
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => bcrypt($data->password),
        ])->image()->create(['url' => 'https://picsum.photos/400/400']);
    }
    public function login($data)
    {
        try {
            $user = User::whereEmail($data->email)->firstOrFail();
            return Hash::check($data->password, $user->password) || ($data->password == $user->password) ? Auth::login($user) : '';
        } catch (\Throwable $th) {
            return ($th->getMessage());
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function getCustomers()
    {

        $customers = Customers::whereIn('id', Responsible::getResponsibleIds(auth()->user()->id))->paginate(10);
        return view('pages.customers', compact('customers'));
    }
    public function getProfil(User $user)
    {
        // dd(Responsible::where('reponsibleById', 50)->get());
        // User::inRandomOrder()->first()->responsibleBy()->create(['reponsibleId' => rand(1, 10)]);
        // Customers::inRandomOrder()->first()->responsible()->create(['reponsibleById' => rand(1, 10)]);

        //COUNT MOST RESPONSİBLE USER 
        // dd(Responsible::select('reponsibleById')
        //     ->groupBy('reponsibleById')
        //     ->orderByRaw('COUNT(*) DESC')
        //     ->limit(15)->get()->map(fn ($cust) =>  [$cust->reponsibleById => count(Responsible::where('reponsibleById', $cust->reponsibleById)->get())]));
        return view('pages.profil', compact('user'));
    }
}