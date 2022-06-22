    @include('landingpage.partials.head')


    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      @include('landingpage.partials.navbar')
      
      @yield('content')
    </main>
    @include('landingpage.partials.footer')
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
  @include('landingpage.partials.js')