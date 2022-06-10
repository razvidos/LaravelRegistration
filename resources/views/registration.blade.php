@extends('layouts.html')


@section('title', 'Registration')

@section('main-content')
    <form>
        {{--Name LastName--}}
        <div class="form-row">
            <div class="col">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First name">
            </div>
            <div class="col">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Last name">
            </div>
        </div>

        {{--Email--}}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        {{--Password--}}
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Password">
        </div>

        {{--Password again--}}
        <div class="form-group">
            <label for="password2">Password again</label>
            <input type="password" class="form-control" id="password2" placeholder="Password">
        </div>

        {{--Submit--}}
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="check">
            <label class="form-check-label" for="check">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
