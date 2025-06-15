<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class CustomerAdminController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(10);
        
        // Hitung statistik
        $totalCustomers = Customer::count();
        $activeCustomers = Customer::where('status', 'active')->count();
        $inactiveCustomers = Customer::where('status', 'inactive')->count();
        
        return view('admin.customer.index', [
            'customers' => $customers,
            'totalCustomers' => $totalCustomers,
            'activeCustomers' => $activeCustomers,
            'inactiveCustomers' => $inactiveCustomers
        ]);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive,new',
            'join_date' => 'nullable|date',
        ]);

        $customerData = array_merge($validated, [
            'join_date' => $request->join_date ?? now()->format('Y-m-d'),
            'order_count' => 0,
            'total_spending' => 'nullable|numeric|min:0',
        ]);

        if($request->hasFile('avatar')) {
            $customerData['avatar'] = $request->file('avatar')->store('customers', 'public');
        }

        Customer::create($customerData);

        return redirect()->route('admin.customer.index')
            ->with('success', 'Pelanggan berhasil ditambahkan');
    }

     public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'phone' => 'required|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive,new',
            'join_date' => 'nullable|date',
            'order_count' => 'required|integer|min:0',
            'total_spending' => 'required|numeric|min:0',
            'remove_avatar' => 'nullable|boolean'
        ]);

        // Handle avatar removal
        if ($request->remove_avatar) {
            if ($customer->avatar) {
                Storage::disk('public')->delete($customer->avatar);
                $validated['avatar'] = null;
            }
        }

        // Handle new avatar upload
        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($customer->avatar) {
                Storage::disk('public')->delete($customer->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('customers', 'public');
        } else {
            // Keep existing avatar if not uploading new one and not removing
            unset($validated['avatar']);
        }

        $customer->update($validated);

        return redirect()->route('admin.customer.index')
            ->with('success', 'Data pelanggan berhasil diperbarui');
    }
    public function edit(Customer $customer)
{
    return view('admin.customer.update', compact('customer'));
}

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('admin.customer.index')
            ->with('success', 'Pelanggan berhasil dihapus');
    }
}