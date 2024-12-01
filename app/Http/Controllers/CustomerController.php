<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_number' => 'required|string|unique:customers',
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
        ]);

        Customer::create($validated);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'customer_number' => 'required|string|unique:customers,customer_number,' . $customer->id,
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
        ]);

        $customer->update($validated);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
