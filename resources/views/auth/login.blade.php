<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <main>


        {{-- errors --}}
        @if ($errors->any())

            <div class="alert alert-danger" role="alert">

                <div class="font-medium text-red-600">
                    {{ __('Whoops! Something went wrong.') }}
                </div>


                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>


            </div>
        @endif



        <form method="POST" action="{{ route('login') }}" style="width: 300px">
            @csrf

            <h1>Login</h1>

            {{-- EMAIL --}}
            <div class="mb-3">

                <label for="email" :value="__('Email')" class="form-label">Email address</label>

                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required
                    autofocus>
            </div>

            {{-- PASSWORD --}}
            <div class="mb-3">
                <label for="password" :value="__('Password')" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                    autocomplete="current-password">
            </div>



            <!-- Remember Me -->
            <div class="mb-3 form-check">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
            </div>

    



            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="mb-3 ">
            
                <a href="/register" class="btn btn-secondary">Singup!</a>
                <button type="submit" class="btn btn-primary"> {{ __('Log in') }}</button>
            
            </div>
         
        </form>


    </main>

</body>

</html>

<style>
    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        display: grid;
        place-content: center;
        min-height: 100vh;
    }
    form h1 {
        color: gray;
        margin: 10px 0;
    }
</style>
