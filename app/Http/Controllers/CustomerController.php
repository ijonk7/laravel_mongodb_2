<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('dashboard', [
            'customers' => $customers
        ]);
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->hobby = implode(",", $request->hobby);
        $customer->date_of_birth = $request->date_of_birth;
        $customer->photo = $request->file('photo')->store('customer', 'public');
        $customer->age = (int) $request->age;
        $customer->status = $request->status[0];
        $customer->vehicle = $request->vehicle;
        $customer->address = $request->address;
        $customer->save();

        return redirect('dashboard')->with('status', 'Customer created successfully');
    }

    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'customer' => $customer
        ]);
    }

    public function update(UpdateCustomerRequest $request)
    {
        $customer = Customer::find($request->idCustomer);
        $customer->name = $request->name;
        $customer->email = $request->email;
        if ($request->filled('password')) {
            $customer->password = Hash::make($request->password);
        }
        $customer->hobby = implode(",", $request->hobby);
        $customer->date_of_birth = $request->date_of_birth;
        if ($request->hasFile('photo')) {
            $customer->photo = $request->file('photo')->store('customer', 'public');
        }
        $customer->age = $request->age;
        $customer->status = $request->status[0];
        $customer->vehicle = $request->vehicle;
        $customer->address = $request->address;
        $customer->save();

        return redirect('dashboard')->with('status', 'Customer updated successfully');
    }

    public function destroy(Customer $customer)
    {
        Storage::disk('public')->delete($customer->photo);
        $customer->delete();

        return redirect('dashboard')->with('status', 'Customer deleted successfully');
    }
}
