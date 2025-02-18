<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 22:09:29 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Log In | Osen - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- Vendor css -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="auth-bg d-flex min-vh-100 justify-content-center align-items-center">
        <div class="row g-0 justify-content-center w-100 m-xxl-5 px-xxl-4 m-3">
            <div class="col-xl-4 col-lg-5 col-md-6">
                <div class="card overflow-hidden text-center h-100 p-xxl-4 p-3 mb-0">
                    <a href="index.html" class="auth-brand mb-3">
                        <img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="dark logo" height="75" class="logo-dark">
                        <img src="https://livwork.conexa.app/logo_empresa/7563ded7eb21972006bf6ba639bba51a.png" alt="logo light" height="75" class="logo-light">
                    </a>

                    <h3 class="fw-semibold mb-2">Bem Vindo</h3>

                    <p class="text-muted mb-4">Entre com seu usuário e senha para acessar o sistema</p>
{{-- 
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <a href="#!" class="btn btn-soft-danger avatar-lg"><i class="ti ti-brand-google-filled fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-success avatar-lg"><i class="ti ti-brand-apple fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-primary avatar-lg"><i class="ti ti-brand-facebook fs-24"></i></a>
                        <a href="#!" class="btn btn-soft-info avatar-lg"><i class="ti ti-brand-linkedin fs-24"></i></a>
                    </div> --}}


                    <form  method="POST" action="{{ route('login') }}" class="text-start mb-3">
                    @csrf
                        <div class="mb-3">
                            <label class="form-label" for="example-email">Email</label>
                            <input  id="example" type="email" name="email" class="form-control" placeholder="Email Cadastrado">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="example-password">Senha</label>
                            <input  type="password"
                            name="password" class="form-control" placeholder="Senha">
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                        

                            <a href="auth-recoverpw.html" class="text-muted border-bottom border-dashed">Esqueci a Senha</a>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>

                    <p class="text-danger fs-14 mb-4">Ainda não é cliente? <a href="auth-register.html" class="fw-semibold text-dark ms-1">Cadastre-se !</a></p>

                   
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>


<!-- Mirrored from coderthemes.com/osen/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 22:09:29 GMT -->
</html>