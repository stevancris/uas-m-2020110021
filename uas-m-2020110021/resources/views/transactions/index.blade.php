@extends('layouts.master')

@section('title', 'Transactions List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Transactions</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success mt-4">
            {{ session()->get('success') }}
        </div>
    @endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Account ID</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row">
                            {{ $transaction->id }}
                        </th>
                        <td>{{ $transaction->kategori }}</td>
                        <td>{{ $transaction->nominal }}</td>
                        <td>{{ $transaction->tujuan }}</td>
                        <td>{{ $transaction->account_id }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                   </tr>
                @empty
                    <tr>
                        <td colspan="8">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Transactions</h1>
        {{-- Add button --}}
        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">Create Transaction</a>
    </div>
@endsection
