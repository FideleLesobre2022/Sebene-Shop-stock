<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/synadmin/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 07:49:07 GMT -->

@include('partials.head')

<body>

<div class="page-wrapper">
    @include('partials.sidebar')
    @include('partials.header')
    <!--start page wrapper -->
    {{-- section --}}
    @yield('content')

    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->


    <!--end wrapper-->
</div>
    @include('partials.footer')
    @include('partials.switcher')
    @include('partials.scripts')
</body>


<!-- Mirrored from codervent.com/synadmin/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 16 Sep 2023 07:49:14 GMT -->

</html>
