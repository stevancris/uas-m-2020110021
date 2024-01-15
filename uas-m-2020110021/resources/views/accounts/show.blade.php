@extends('layouts.master')

@section('title', $account->title)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $account->title }}</h1>
        <p class="blog-post-meta">{{ $account->updated_at }}</p>
        @if ($account->image)
            <img src="{{ $account->image_url }}" class="rounded mx-auto d-block my-3">
        @endif
        <p>{{ $account->body }}</p>
    </article>
@endsection
