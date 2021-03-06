@extends('front.layouts.main')

@push('headers')
    <link rel="canonical" href="{{ route('profile.events.show', $user->idSlug()) }}" />
@endpush

@section('content')
    {{ Menu::profile($user) }}

    @include('front.profile.partials.profile')

    @foreach($events as $event)
        <div>
            <a href="{{ route('events.show-schedule', $event->idSlug()) }}">{{ $event->name }}</a>
            {{ $event->timeSpan() }}
            {{ $event->location }}, {{ $event->city }} {{ $event->country_emoji }}
        </div>

    @endforeach

    <pagination
        :paginator="$events"
        next-label="Older events"
        previous-label="Newer events"
    />
@endsection