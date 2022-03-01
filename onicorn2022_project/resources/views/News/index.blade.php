@extends('Layouts.master')
@section('title','News|List')
@section('content')
<div class="content-page">
    <div class="content">
        <!-- Form List News  !-->
        @include('News.list_new')
        <!-- end of Form list News!-->
    </div>
</div>
@endsection
