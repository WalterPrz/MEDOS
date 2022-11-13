@extends('admin.layouts.index')

@section('content')

<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>¡Bienvenido <span> @auth
          {{ Auth::user()->name }}!
          @endauth</span></h1>
      <h2>Bienvenido a Medical Operative System</h2>
      @if ($existe)
      <script >

        Swal.fire(
        '¡Hay medicamentos próximos a vencer!',
        'Realiza las devoluciones',
        'warning'
        )
        </script>
      @endif

    </div>
  </section><!-- End Hero -->


@endsection