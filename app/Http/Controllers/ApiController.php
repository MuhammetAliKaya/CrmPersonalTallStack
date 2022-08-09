<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customers;
use App\Models\Responsible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\GetTokenRequest;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Requests\CustomerStoreRequest;

class ApiController extends Controller
{
    public function getToken(GetTokenRequest $request)
    {

        return  Auth::attempt(['email' => $request->email, 'password' => $request->password]) ? ['token' => auth()->user()->createToken('api-access')->plainTextToken, 'info' => 'succes' . info('token created user with id ' . auth()->user()->id)] : 'email or password  is wrong ';
    }

    public function index(Request $request)
    {
        $user = $this->getUserFromToken($request->header('authorization'));
        info('user with id ' . $user->id . ' showed  all customers ');
        return $customers = Customers::whereIn('id', Responsible::getResponsibleIds($user->id))->get()->map(function ($customer) {
            $customer->underTheResponsibility = auth()->user()->name;
            return $customer;
        });
    }


    public function store(CustomerStoreRequest $request)
    {
        $user = $this->getUserFromToken($request->header('authorization'));
        info($request->email . ' created by ' . $user->id);
        return [
            'message' => 'succesfully added', 'data' => $cust = Customers::create($request->validated()),
            'responsilbe' => $cust->responsible()->create(['reponsibleById' => $user->id]),
            'image' => $cust->image()->create(['url' => 'https://picsum.photos/400/400'])
        ];
    }

    public function show($id)
    {
        $user = $this->getUserFromToken(getallheaders()['Authorization']);
        $cust = Customers::select('id', 'name', 'surname', 'email', 'phoneNumber')->find($id);

        if (Gate::forUser($user)->allows('accessCustomer', $id)) {
            return ($cust) ?  json_encode($cust)  . info(' user with id ' . $user->id . ' showed customer with id ' . $cust->id . '(chanell=APİ)') : 'customer not found';
        } else {
            return  abort(402, 'You tried to SHOW data that is probably beyond your responsibility');
        }
    }

    public function update(Request $request, $id)
    {
        $user = $this->getUserFromToken($request->header('authorization'));

        if (Gate::forUser($user)->allows('accessCustomer', $id)) {
            return ['customer' => $cust = Customers::whereId($id)->first(), 'status' => $cust->update($request->all()) . info('user with id 1' . $user->id . ' updated customer with id ' . $id)];
        } else {
            return 'You tried to UPDATE data that is probably beyond your responsibility ';
        }
    }

    public function destroy($id)
    {
        $user = $this->getUserFromToken(getallheaders()['Authorization']);

        if (Gate::forUser($user)->allows('accessCustomer', $id)) {
            return (Customers::whereId($id)->delete() ?
                ['info' => 'succesfully deleted' . info('user with id ' . $user->id . ' deleted customer with id ' . $id)] : 'problem occurred (probably this customer already deleted)');
        } else {
            return 'You tried to DELETE data that is probably beyond your responsibility ';
        }
    }

    private static function getUserFromToken($data)
    {
        $token = PersonalAccessToken::findToken(explode(" ", $data)[1]);
        return $user = $token->tokenable;
    }
}