@extends('admin.layouts.index')

@section('content')

        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">

            <!-- Page Content -->
            <main>
               @yield('content')
            </main>
        </div>

        @stack('modals')



@endsection
