<?php

namespace App\Http\Livewire;

use App\Models\Customers;
use App\Models\Responsible;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerTable extends Component
{
    public $customers;
    public $currentCustomer;

    public $customerNewName;
    public $customerNewSurname;
    public $customerNewEmail;
    public $customerNewPhoneNumber;

    protected $rules = [
        'customerNewName' => 'required|min:6',
        'customerNewSurname' => 'required|min:6',
        'customerNewEmail' => ['required', 'unique:App\Models\Customers,email'],
        'customerNewPhoneNumber' => 'required|min:6',
    ];

    public function __construct()
    {
        $responsiblesIds = Responsible::where('reponsibleById', Auth::user()->id)->get('reponsibleId');
        $this->customers = Customers::whereIn('id', $responsiblesIds)->get();
    }
    public function setCurrentCustomer($data)
    {
        $this->currentCustomer = Customers::whereId($data)->first();
        $this->customerNewName = $this->currentCustomer->name ?? null;
        $this->customerNewSurname = $this->currentCustomer->surname ?? null;
        $this->customerNewEmail = $this->currentCustomer->email ?? null;
        $this->customerNewPhoneNumber = $this->currentCustomer->phoneNumber ?? null;
    }
    public function editCustomer()
    {
        $this->validate();

        Customers::whereId($this->currentCustomer->id)->update([
            'name' => $this->customerNewName,
            'surname' => $this->customerNewSurname,
            'email' => $this->customerNewEmail,
            'phoneNumber' => $this->customerNewPhoneNumber
        ]);
        $this->__construct();
    }
    public function clear()
    {
        $this->customerNewName = null;
        $this->customerNewSurname = null;
        $this->customerNewEmail =  null;
        $this->customerNewPhoneNumber = null;
    }
    public function createCustomer()
    {
        $this->validate();

        $cust = Customers::create([
            'name' => $this->customerNewName,
            'surname' => $this->customerNewSurname,
            'email' => $this->customerNewEmail,
            'phoneNumber' => $this->customerNewPhoneNumber
        ]);
        $cust->responsible()->create([
            'reponsibleId' => $cust->id,
            'reponsibleById' => auth()->user()->id
        ]);
        $this->__construct();
    }
    public function render()
    {
        return view('livewire.customer-table');
    }
}