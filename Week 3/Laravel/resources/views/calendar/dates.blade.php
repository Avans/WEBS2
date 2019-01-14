<table class="calendar">
    <tr><td colspan="{{ count($days) }}" id="calendar_month"><a href="/calendar/month/{{ $calendar->getMonthID() }}">{{ $calendar->renderMonthName() }}</a></td></tr>
    <tr>
        @foreach ($days as $day)
            <th>{{ $day }}</th>
        @endforeach
    </tr>
    <tr>
        @foreach ($calendar->dates() as $curdate)
            @if ($curdate == 'empty')
                @include('calendar.emptyday')
            @else
                @if ($curdate['weekday'] == 0)
    </tr><tr>
                @endif
                @include('calendar.date', $curdate)
        @endif
@endforeach
</tr>
</table>