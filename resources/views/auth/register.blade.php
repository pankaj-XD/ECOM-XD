<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    
    <main>


        {{-- errors --}}
        @if ($errors->any())

            <div class="alert alert-danger" role="alert">
 
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>


            </div>
        @endif



        <form method="POST" action="{{ route('register') }}" style="width: 300px">
            <h1>Register Form</h1>
            @csrf

            {{-- name --}}
             <div class="mb-3">
                <label  for="name" :value="__('Name')" class="form-label" >Name</label>
                <input id="name"  class="form-control"   type="text" name="name" :value="old('name')" required autofocus >
            </div>


            {{-- EMAIL --}}
            <div class="mb-3">

                <label for="email" :value="__('Email')" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" :value="old('email')" required >
            </div>


            {{-- PASSWORD --}}
            <div class="mb-3">
                <label for="password" :value="__('Password')" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required
                autocomplete="new-password">
            </div>


               <!-- Confirm Password -->
               <div class="mb-3">
                <label for="password_confirmation" class="form-label" :value="__('Confirm Password')" >Confirm Password</label>

                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required />
                </div>




            <a  href="{{ route('login') }}" style="padding: 10px">
                {{ __('Already registered?') }}
            </a>
            <button type="submit" class="btn btn-primary"> {{ __('Register') }}</button>
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


      

         


         
            

             