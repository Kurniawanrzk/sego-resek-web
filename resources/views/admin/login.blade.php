   <style>
    .container,.row {
        height: 100vh;
    }
   </style>
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Login Admin Page</title>
    </head>
    <body>
        <div class="container">
            <div class="row p-2 d-flex flex-direction-co justify-content-center align-items-center flex-column">
                <div class="col-lg-5 col-10">
                    @if(\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ \Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    {{ \Session::forget('success') }}
                    @if(\Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ \Session::get('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
                <br>
                <div class="col-lg-5 col-10 border p-3 shadow-sm">
                   <form action="{{ Route("admin_login_post") }}" method="post" >
                    @csrf
                    <h5 class="text-center">admin login</h5>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Username</span>
                        <input type="text" class="form-control" placeholder="" aria-label="username" name="username" value="{{old('username') }}" autofocus aria-describedby="addon-wrapping">
                    </div>
                    <br>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Password</span>
                        <input type="password" class="form-control" placeholder="min:5" name="password" value="{{old('password') }}" aria-label="password" aria-describedby="addon-wrapping">
                    </div>
                    <br>
                    <center>
                            <button class="btn btn-success">Login</button>
                    </center>
                   </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
    </html>