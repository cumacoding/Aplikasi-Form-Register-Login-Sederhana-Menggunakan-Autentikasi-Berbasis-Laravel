<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>

<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">Register Form</h3>
                <hr>
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input id="email" type="text" name="email"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                            required="">
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
                    <div class="form-group">
                        <label><i class="fa fa-address-book"></i> Role</label>
                        <input type="text" name="role" class="form-control" value="Guest" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i>
                        Register</button>
                    <hr>
                    <p class="text-center">Do you have an account? <a href='/'>Please Login</a></p>
                </form>
        </div>
    </div>
</body>

</html>
