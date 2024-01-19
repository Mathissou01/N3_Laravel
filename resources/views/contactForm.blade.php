@extends('layouts.dashboard')

@section('content')
<form method="POST">
    @csrf
    <div>
        <label for="name">Nom</label><br>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date" value="{{ old('date') }}">
        @error('date')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Submit</button>
</form>
@endsection