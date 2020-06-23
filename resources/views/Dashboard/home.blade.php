@extends('Dashboard.layout.app')

@section('title')
Home page
@endsection


@push('css')

<style>
  /* a {
    color: red !important;
  } */
</style>
@endpush

@section('content')

@component('Dashboard.layout.header')

@slot('nav_title')
Home page
@endslot

@endcomponent



@include('Dashboard.home-sections.statistics')

@include('Dashboard.home-sections.latest-comments')

@endsection

@push('js')
{{-- <script>
      alert('welcome');
      </script> --}}
@endpush