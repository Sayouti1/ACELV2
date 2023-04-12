<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
    <link rel="stylesheet" href="{{ asset('css/LoginPage.css') }}">
</head>

<body>
    <section class="w3l-mockup-form">
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-mockup">
                    <div class="alert-close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="w3l_form  ">
                        <div class="left_grid_info d-sm-none">
{{--                            <img src="images/nobg3684.png" alt="">--}}
                            <img src="{{asset('images/online-class.png')}}" alt="">
                        </div>
                    </div>
                    <div class="content-wthree">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <h2>Connectez-Vous</h2>
                        <p>Veuillez entrer vos identifiants pour accéder à votre compte. </p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="exemple@mail.com">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password"style="margin-bottom: 2px;" required placeholder="******">
                            <p><a href="{{route('password.request')}}"
                                    style="margin-bottom: 15px; display: block; text-align: right;">Mot de passe oublié
                                    ?</a>
                            </p>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
</body>

</html>
