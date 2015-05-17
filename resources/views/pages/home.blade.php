@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Larabook!</h1>
        <p>Welcome to the premier place to talk about Laravel with others. Why  don't you sign up to see what all the Fuzz is about.</p>
        <p>
            {!! link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) !!}
        </p>
    </div>
@endsection