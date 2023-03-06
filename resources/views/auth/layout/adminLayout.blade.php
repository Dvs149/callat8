{{-- <!DOCTYPE html>
<html lang="en">
<head>
  @include(Helpers::file_path("admin.head"))
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                    @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include(Helpers::file_path("admin.script"))
  @yield('script')
</body>
</html>
 --}}



<!DOCTYPE html>
<html>

<head>
    @include(Helpers::file_path('admin.head'))
</head>

<body class="loginpage">
    @yield('content')
    <div class="loginfooter">
        <span>&copy;Copyright
            <script type="text/javascript">
                document.write(new Date().getFullYear())
            </script> Callat7. All Rights Reserved.
        </span>
    </div>
    @include(Helpers::file_path('admin.script'))
    @yield('script')
</body>

</html>
