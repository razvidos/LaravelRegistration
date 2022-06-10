@extends('layouts.html')


@section('title', 'Registration')

@section('main-content')
    <div class="alert alert-success" style="display:none"></div>
    <form id="registration" action="">
        {{--Name LastName--}}
        <div class="form-row">
            <div class="col">
                <label for="first_name">First name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First name" required>
            </div>
            <div class="col">
                <label for="last_name">Last name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Last name" required>
            </div>
        </div>

        {{--Email--}}
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"
                   required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        {{--Password--}}
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" class="form-control" id="password1" placeholder="Password" required>
        </div>

        {{--Password again--}}
        <div class="form-group">
            <label for="password2">Password again</label>
            <input type="password" class="form-control" id="password2" placeholder="Password" required>
        </div>

        {{--Submit--}}
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="check">
            <label class="form-check-label" for="check">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary" id="ajaxSubmit">Submit</button>
    </form>
@endsection

@section('end_scripts')
    <script>
        jQuery(document).ready(function () {
            jQuery('#ajaxSubmit').click(function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/registration') }}",
                    method: 'post',
                    data: {
                        first_name: jQuery('#first_name').val(),
                        last_name: jQuery('#last_name').val(),
                        email: jQuery('#email').val(),
                        password1: jQuery('#password1').val(),
                        password2: jQuery('#password2').val(),
                    },
                    success: function (result) {
                        const alert_block = jQuery('.alert');
                        alert_block.show();
                        alert_block.html(result.success);
                    }
                });
            });
        });
    </script>
@endsection
