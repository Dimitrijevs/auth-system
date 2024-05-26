@extends('layout.default')

@section('content')
    <div class="container flex flex-col md:flex-row flex-wrap my-6 font-bold lg:mt-8 text-3xl items-center md:items-start">
        <h1 class="text-gray-900 page-title title-font">
            <span class="base" data-ui-id="page-title-wrapper">Hello, {{ $firstname }} {{ $lastname }}! </span>
        </h1>
        <a data-test="logout" href="{{ url('logout') }}"
            class="btn btn-primary ml-2 bg-green-700 hover:bg-green-500 active:bg-green-900 disabled:opacity-75">Logout</a>
    </div>
@stop
