<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login form with JavaScript Validation</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="logo text-center mt-5">
</div>
<div class="wrapper mt-120">
  <div class="inner-warpper text-center">
    <h2 class="title">Login to your account</h2>
    <form action="/login" id="formvalidate" method="post">
      @csrf
      <div class="input-group">
        <label class="palceholder" for="email">Email</label>
        <input class="form-control" name="email" id="email" @error('email') is-invalid
        @enderror type="email" />
        <span class="lighting"></span>
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="input-group">
        <label class="palceholder" for="password">Password</label>
        <input class="form-control" name="password" id="password" type="password" placeholder=""  required/>
        <span class="lighting"></span>
      </div>
      <button type="submit" id="login">Login</button>
    </form>
  </div>
  <div class="signup-wrapper text-center">
    <a href="#">Don't have an accout? <span class="text-primary">Create One</span></a>
  </div>
</div>


<!-- partial -->
  <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'>
</script><script  src="/js/script.js"></script>

</body>
</html>
