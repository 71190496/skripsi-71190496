 {{-- <body class="text-left">
        <main id="main" class="form-signin w-100 m-auto">
            <img class="mb-0" src="/img/stc.png" alt="" width="170" height="70" style="align-items: center">
            @if (session()->has('berhasil'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('berhasil') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            
            <h1 class=" mb-3 mt-4 fw-normal text-center"> Silahkan login</h1>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email"
                        placeholder="name@example.com" autofocus @error('email') is-invalid
                @enderror>
                    <label for="email">Email</label>
                    @error('email')
                        <div class="text-danger mt-2" style="text-align: left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')
                        <div class="text-danger mt-2" style="text-align: left">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            </form>
            <div class="signup-wrapper text-center mt-4 mb-3">
                <a href="/register">Belum punya akun? <span class="text-success">Buat akun</span></a>
            </div>
            </form>
        </main>
    </body> --}}
 <!doctype html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>STC | Login</title>

     <!-- Custom fonts for this template-->
     <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
     <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">


     <!-- Custom styles for this template-->
     <link href="{{ asset('style/css/sb-admin-2.css') }}" rel="stylesheet">

 </head>

 <body class="bg-gradient-success">

     <div class="container">

         <!-- Outer Row -->
         <div class="row justify-content-center">

             <div class="col-xl-7 col-lg-12 col-md-8">

                 <div class="card o-hidden border-0 shadow-lg my-5">
                     <div class="card-body p-0">
                         <!-- Nested Row within Card Body -->
                         <div class="row">
                             <div class="col-lg-1"></div>
                             <div class="col-lg-10">
                                 <div class="p-5">
                                     <div class="text-center">
                                         <h1 class="h4 text-gray-900 mb-4">SATUNAMA Training Center</h1>
                                     </div>
                                     <form action="{{ route('login') }}" method="post" class="user">
                                         @csrf
                                         <div class="form-group">
                                             {{-- <input type="email" class="form-control form-control-user"
                                                 id="exampleInputEmail" aria-describedby="emailHelp"
                                                 placeholder="Masukan Email"> --}}
                                             <input type="email" class="form-control form-control-user"
                                                 value="{{ old('email') }}" id="email" name="email"
                                                 placeholder="Masukan Email" autofocus
                                                 @error('email') is-invalid  @enderror>
                                         </div>


                                         <div class="form-group">
                                             <div class="password-container">
                                                 <input type="password" class="form-control form-control-user"
                                                     id="password" name="password" placeholder="Masukan Password"
                                                     @error('email') is-invalid @enderror>
                                                 <span toggle="#password"
                                                     class="fa fa-fw fa-eye field-icon toggle-password-login"
                                                     onclick="togglePassword()"></span>
                                             </div>
                                         </div>
                                         @error('email')
                                             <div class="text-danger" style="text-align: left">
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                         @error('password')
                                             <div class="text-danger" style="text-align: left">
                                                 {{ $message }}
                                             </div>
                                         @enderror
                                         <hr>
                                         <button class="btn btn-success btn-user btn-block"
                                             type="submit">Login</button>
                                     </form>
                                     <hr>
                                     <div class="text-center">
                                         <a class="small" href="/register">Belum punya akun? Sign Up</a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>

         </div>

     </div>

     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('style/vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

     <!-- Core plugin JavaScript-->
     <script src="{{ asset('style/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

     <!-- Custom scripts for all pages-->
     <script src="{{ asset('style/js/sb-admin-2.min.js') }}"></script>

     <script>
         function togglePassword() {
             var passwordInput = document.getElementById("password");
             var toggleIcon = document.querySelector(".toggle-password-login");

             if (passwordInput.type === "password") {
                 passwordInput.type = "text";
                 toggleIcon.classList.remove("fa-eye");
                 toggleIcon.classList.add("fa-eye-slash");
             } else {
                 passwordInput.type = "password";
                 toggleIcon.classList.remove("fa-eye-slash");
                 toggleIcon.classList.add("fa-eye");
             }
         }
     </script>

 </body>

 </html>
