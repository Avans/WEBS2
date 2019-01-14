@extends('layouts.calendar')

@section('content')

@for ($i = 0; $i < 10; $i++)
    @include('calendar.dates')
{{ $calendar->shiftMonth() }}
@endfor
@endsection