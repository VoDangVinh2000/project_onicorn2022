@extends('Layouts.master')
@section('title','Header')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- category !-->
        {{-- @include('Menus.partials.categories') --}}
        <!-- end of category !-->

        <!-- Form List  !-->
        @include('Menus.partials.list')
        <!-- end of Form list !-->
        {{-- @include('Menus.partials.form_menu_structure') --}}
    </div>
</div>
@endsection
