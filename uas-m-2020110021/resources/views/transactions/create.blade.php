@extends('layouts.master')

@section('title', 'Add New Transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" id="kategori" value="{{ old('kategori') }}">
                        <option value="">Choose</option>
                        <option value="Income">Income</option>
                        <option value="Expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" class="form-control" id="nominal" name="nominal" value="{{ old('nominal') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="account_id">Account ID</label>
                    <select name="nama" id="nama">
                        {{-- @foreach($account as $item)
                            <option value="{{ $item->id }}">{{ $item->account_id }}</option>
                        @endforeach --}}
                </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
