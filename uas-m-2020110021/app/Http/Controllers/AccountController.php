<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::all();
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'nama' => 'required|string',
            'jenis' => 'required|string|min:3|max:50',
        ]);
        // dump($validated);

        $account = Account::create([
           'id' => $validated['id'],
           'nama' => $validated['nama'],
           'jenis' => $validated['jenis'],
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
     return view('accounts.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'nama' => 'required|string',
            'jenis' => 'required|string|min:3|max:50',
        ]);
        // dump($validated);

        $account = Account::create([
           'id' => $validated['id'],
           'nama' => $validated['nama'],
           'jenis' => $validated['jenis'],
        ]);

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
