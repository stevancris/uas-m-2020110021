@extends('layouts.master')

@section('title', 'Accounts and accounts List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All accounts</h1>
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
                @forelse ($accounts as $account)
                    <tr>
                        <th scope="row">{{ $account->id }}</th>
                        <td>
                            <a href="{{ route('accounts.show', $account) }}">
                                {{ $account->category }}</td>
                            </a>
                        <td>{{ $account->type }}</td>
                        <td>{{ Str::limit($account->notes, 50, ' ...') }}</td>
                        <td>{{ $account->amount }}</td>
                        <td>{{ $account->created_at }}</td>
                        <td>{{ $account->updated_at }}</td>
                        <td>
                            <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $totalAmount += $account->amount;

                        if ($account->type === 'Income') {
                            $totalIncome += $account->amount;
                            $incomeCount++;
                        } elseif ($account->type === 'Expense') {
                            $totalExpense += $account->amount;
                            $expenseCount++;
                        }
                    @endphp
                    {{-- <tr>
                        <td>Test</td>
                    </tr> --}}
                @empty
                    <tr>
                        <td colspan="8">No accounts found.</td>
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
        <h1>All accounts</h1>
        {{-- Add button --}}
        <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">Create account</a>
    </div>
@endsection
