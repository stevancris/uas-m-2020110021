@extends('layouts.master')

@section('title', 'Accounts List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Accounts</h1>
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
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($accounts as $account)
                    <tr>
                        <th scope="row">
                            {{ $account->id }}
                        </th>
                        <td>{{ $account->nama }}</td>
                        <td>{{ $account->jenis }}</td>
                        <td>{{ $account->created_at }}</td>
                        <td>{{ $account->updated_at }}</td>
                        <td>
                            <a href="{{ route('accounts.edit', $account) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            {{-- <form action="{{ route('accounts.destroy', $accounts) }}" method="POST" class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No accounts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Accounts</h1>
        {{-- Add button --}}
        <a href="{{ route('accounts.create') }}" class="btn btn-primary btn-sm">Create Account</a>
    </div>
@endsection
