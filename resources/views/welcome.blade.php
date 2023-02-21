@extends('layouts.app')

@section('title', 'Home')
@section('meta-description', 'Home meta-description')


@section('content')

<h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">appDestiny</h1>

@auth
    <div class="text-white">
        Welcome {{Auth::user()->name}} !
    </div>
@endauth

@endsection

