@extends('layouts.calendar')

@section('content')
    <a href="/calendar/year">Jaaroverzicht</a>
    @include('calendar.dates')
@endsection