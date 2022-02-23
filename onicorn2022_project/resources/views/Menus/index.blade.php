@extends('Layouts.master')
@section('title','Header')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- category !-->
        @include('Menus.partials.categories')
        <!-- end of category !-->

        <!-- List and form add !-->
        @include('Menus.partials.list')
        <!-- end of list and form add !-->

    </div>
</div>
@endsection
