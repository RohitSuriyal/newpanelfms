<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .login_background {
            position: relative;
            overflow: hidden;
        }

        .login_background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/images/pexels-pixabay-159711 (1).jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(8px);
            /* Adjust the blur level as needed */
            z-index: -1;
            /* Place it behind the content */
        }
    </style>
</head>

<body>

    <div class="border border-danger border-2 d-flex justify-content-center align-items-center login_background" style="height:100vh">
        <div class="w-25 shadow rounded p-3">
            <form method="post" class="px-5 py-5" action="{{ route('login') }}" style="background-color:white;border-radius:10px">
                @csrf
                <h3 class="fw-bold mb-4 text-center">LOGIN</h3>

                <!-- Username Field -->
                <div>
                    <label>Username</label>
                    <input class="form-control @error('username') is-invalid @enderror" name="username" style="border-radius:10px" value="{{ old('username') }}" placeholder="Enter your username">
                    <!-- //this is for the validation error -->
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mt-3">
                    <label class="bold">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="border-radius:10px" placeholder="Enter your passwoord">
                    <!-- //this is for the validation error -->
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button class="btn btn-primary w-100 mt-3">Login</button>
            </form>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>