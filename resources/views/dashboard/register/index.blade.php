<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FHM Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
</head>

<body>

    <section class="vh-100" style="background-color: #FBFBFB;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('admin.register') }}" method="post">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">FHM Book Store</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register here,</h5>

                                        <div data-mdb-input-init class="form-outline mb-2">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg mb-2" name="name"
                                                value="{{ old('name') }}" />
                                            <label class="form-label mb-1" for="form2Example17">Full Name</label>
                                            @error('name')
                                                <p class="text-danger" style="font-size: 10px;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-2">
                                            <input type="email" id="form2Example17"
                                                class="form-control form-control-lg mb-2" name="email"
                                                value="{{ old('email') }}" />
                                            <label class="form-label mb-1" for="form2Example17">Email address</label>
                                            @error('email')
                                                <p class="text-danger" style="font-size: 10px;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-2">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg mb-2" name="password"
                                                value="{{ old('password') }}" />
                                            <label class="form-label mb-1" for="form2Example27">Password</label>
                                            @error('password')
                                                <p class="text-danger" style="font-size: 10px;">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Register
                                                Now</button>
                                        </div>

                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">Already have an account? <a
                                                href="{{ route('admin.login') }}" style="color: #393f81;">Login
                                                here</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>
</body>

</html>
