@include('layouts.component.header')


<div class="container-fuild">
    <div class="row">
        <!-- Sidebar (Kiri) -->
         <div class="col-md-3 bg-light vh-100">
            @include('layouts.component.sidebar')
         </div>

         <!-- Konten Utama (kanan) -->
          <div class="col-md-9 p-4"></div>
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.component.footer')
