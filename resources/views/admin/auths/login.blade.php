@extends('admin.auths.layouts.app')
@section('content')
    <div class="row min-vh-100">
        <div class="col-md-5 col-lg-6 col-xl-4 px-lg-5 d-flex align-items-center">
            <div class="w-100 py-5">
                <div class="text-center"><img src="img/brand/brand-1.svg" alt="..." style="max-width: 6rem;" class="img-fluid mb-4">
                    <h1 class="display-4 mb-3">Sign in</h1>
                </div>
                <?php generateFlashMessage(); ?>
                <form action="login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email Address</label>
                        <input name="loginUsername" type="email" placeholder="name@address.com" autocomplete="off" required data-msg="Please enter your email" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <div class="row">
                            <div class="col">
                                <label>Password</label>
                            </div>
                            <div class="col-auto"><a href="#" class="form-text small text-muted">Forgot password?</a></div>
                        </div>
                        <input name="loginPassword" placeholder="Password" type="password" required data-msg="Please enter your password" class="form-control">
                    </div>
                    <!-- Submit-->
                    <button class="btn btn-lg btn-block btn-primary mb-3" type="submit">Sign in</button>
                    <!-- Link-->
                    <p class="text-center"><small class="text-muted text-center">Don't have an account yet? <a href="register-2.html">Register</a>.</small></p>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Image-->
            <div style="background-image: url({{asset('admin/img/photos/victor-ene-1301123-unsplash.jpg')}});" class="bg-cover h-100 mr-n3"></div>
        </div>
    </div>
@endsection
