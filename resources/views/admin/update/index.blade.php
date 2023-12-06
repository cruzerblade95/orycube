@extends('layouts.admin')

@section('content')
    <style>
        .changelog ul,
        .changelog ol {
            list-style-type: disc;
            list-style-position: inside;
        }
    </style>
    <div class="w-1/2 text-center mx-auto">
        <div class="alert alert-success">
            You have the latest version of Orycube
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <form method="POST" action="{{ route('admin.database.refresh.sidebar') }}">
        @csrf
        <button type="submit" class="btn btn-blue"><i class="bi bi-arrow-repeat mr-1"></i>
            {{ __('Refresh Sidebar') }}</button>
    </form>
    @can('terminal_access')
        <a class="btn btn-dark" href="{{ route('admin.terminal') }}"><i class="bi bi-terminal mr-1"></i>
            {{ __('Terminal') }}</a>
    @endcan
    <a class="btn btn-success" href="{{ route('admin.clean') }}"><i class="bi bi-speedometer2 mr-1"></i>
        {{ __('Optimize') }}</a>
@endpush
