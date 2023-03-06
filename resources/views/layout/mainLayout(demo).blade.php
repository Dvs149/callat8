{{-- main layout for admin panel --}}
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    @include(Helpers::file_path("sidebar"))
    <!-- End of Sidebar -->
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
          @include(Helpers::file_path("topbar"))
        <!-- End of Topbar -->
        <!-- Begin Page Content -->

        @yield('content')

      <!-- Begin Page Content -->

        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
    @include(Helpers::file_path("footer"))
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Scroll to Top Button ends her-->

  <!-- Logout Modal-->
  @include(Helpers::file_path("logout"))
  @include(Helpers::file_path("delete"))
  @include(Helpers::file_path("status"))
  <!-- Logout Modal ends-->
  @include(Helpers::file_path("script"))
  @yield('script')
</body>
</html>






