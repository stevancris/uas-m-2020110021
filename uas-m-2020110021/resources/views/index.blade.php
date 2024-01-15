@extends('layouts.master')

@section('title', 'Accounts and Transactions List')

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
                    <th scope="col">Category</th>
                    <th scope="col">Type</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAmount = 0;
                    $totalIncome = 0;
                    $totalExpense = 0;
                    $incomeCount = 0;
                    $expenseCount = 0;
                @endphp
                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row">{{ $transaction->id }}</th>
                        <td>
                            <a href="{{ route('transactions.show', $transaction) }}">
                                {{ $transaction->category }}</td>
                            </a>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ Str::limit($transaction->notes, 50, ' ...') }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalAmount += $transaction->amount;

                        if ($transaction->type === 'Income') {
                            $totalIncome += $transaction->amount;
                            $incomeCount++;
                        } elseif ($transaction->type === 'Expense') {
                            $totalExpense += $transaction->amount;
                            $expenseCount++;
                        }
                    @endphp
                    {{-- <tr>
                        <td>Test</td>
                    </tr> --}}
                @empty
                    <tr>
                        <td colspan="8">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">Total Amount</th>
                <th scope="col">Total Income</th>
                <th scope="col">Total Expense</th>
                <th scope="col">Jumlah Transaksi Income</th>
                <th scope="col">Jumlah Transaksi Expense</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $totalAmount }}</td>
                <td>{{ $totalIncome }}</td>
                <td>{{ $totalExpense }}</td>
                <td>{{ $incomeCount }}</td>
                <td>{{ $expenseCount }}</td>
            </tr>
        </tbody>
        {{-- <p>Total Amount: {{ $totalAmount }}</p>
        <p>Total Income: {{ $totalIncome }}</p>
        <p>Total Expense: {{ $totalExpense }}</p>
        <p>Jumlah Transaksi Income: {{ $incomeCount }}</p>
        <p>Jumlah Transaksi Expense: {{ $expenseCount }}</p> --}}
    </table>
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Transactions</h1>
        {{-- Add button --}}
        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">Create Transaction</a>
    </div>
@endsection
