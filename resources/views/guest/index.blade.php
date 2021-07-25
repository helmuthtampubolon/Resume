@extends('guest.layout.app')
@section('content')
    <div class="container-fluid p-0">
        <!-- About-->
        @include('guest.content.about')
        <hr class="m-0"/>
        <!-- Experience-->
        @include('guest.content.experience')
        <hr class="m-0"/>
        <!-- Education-->
        @include('guest.content.education')
        <hr class="m-0"/>
        <!-- Skills-->
        @include('guest.content.skills')
        <hr class="m-0"/>
        <!-- Interests-->
        @include('guest.content.interest')
        <hr class="m-0"/>
        <!-- Awards-->
        @include('guest.content.awards')
    </div>
@endsection
