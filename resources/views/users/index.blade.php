@extends('layouts.dashboard')

@section('content')
    <h1>Utilisateurs</h1>
    <ul>
        @foreach ($users as $user)
            <li>
                <a href="{{ route('user.show', ['id' => $user['id']]) }}">{{ $user['name'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection