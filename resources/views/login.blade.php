<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>Login Form</b><br>Application</h3>
                <hr>
                @if (session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id="email" type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                            required="" />
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fa fa-key"></i> Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id = "password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                            required="">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="register">Register</a> sekarang!</p>
                </form>
        </div>
    </div>
</body>

</html>
