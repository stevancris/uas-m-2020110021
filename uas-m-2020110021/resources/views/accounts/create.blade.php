@extends('layouts.master')

@section('title', 'Add New Account')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Account</h1>
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
            <form action="{{ route('accounts.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ old('id') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="jenis">Jenis</label>
                    <select class="form-control" name="jenis" id="jenis" value="{{ old('jenis') }}">
                        <option value="">Choose</option>
                        <option value="Personal">Personal</option>
                        <option value="Bisnis">Bisnis</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
