<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maro Barbershop</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Maro Barbershop</h4>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p class="h5 mb-4">Please sign in to continue</p>
                                    <div class="form-outline mb-4">
                                        <input type="email" id="email"
                                            class="form-control form-control-sm @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Email address" required
                                            autocomplete="email" autofocus />
                                        <label class="form-label sr-only" for="email">Email Address</label>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="password"
                                            class="form-control form-control-sm @error('password') is-invalid @enderror"
                                            name="password" placeholder="Password" required
                                            autocomplete="current-password" />
                                        <label class="form-label sr-only" for="password">Password</label>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check d-flex justify-content-between mb-4">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                        <a href="{{ route('password.request') }}" class="text-muted">Forgot
                                            password?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg gradient-custom-2 mb-4"
                                        type="submit">Sign in</button>
                                </form>
                                <div class="text-center">
                                    <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}"
                                            class="text-muted">Sign up</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/img/gallery/gallery4.png') }}" class="img-fluid w-90"
                                alt="Responsive Image">
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>