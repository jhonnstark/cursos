@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista</li>
            </ol>
        </nav>
    </div>
    @if($role == 'course')
        <course-list role="{{ $role }}"></course-list>
    @else
        <admin-list role="{{ $role }}"></admin-list>
    @endif
@endsection
