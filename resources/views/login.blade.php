@extends('layouts.base')

@section('title', 'Login')

@section('content')
<form id="login">
    <label for="email">First name:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Last name:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Submit">
</form>

<script type="module">
    $('#login').on('submit', function(e) {
        e.preventDefault();

        const url = "{{ route('auth.post.login') }}";
        const email = $('#email').val();
        const password = $('#password').val();

        console.log('Submitting to', url);
        console.log('Email:', email);
        console.log('Password:', password);

        $.post(url, {
            email: email,
            password: password,
        })
        .done(function(res) {
            console.log(res);
            window.location.href = res.url;
        })
        .fail(function(xhr) {
            alert(xhr.responseJSON?.message || 'Login failed');
        });
    });
</script>
@endsection
