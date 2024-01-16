@extends('layouts.master')

@section('title', 'Menu')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Menu</h1>
        {{-- Add button --}}
        <a href="{{ route('accounts.index') }}" class="btn btn-primary btn-sm">List Accounts</a>
        <a href="{{ route('transactions.index') }}" class="btn btn-primary btn-sm">List Transactions</a>
    </div>
@endsection
