<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/carstyle.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="section-cars">
            <h1>RENT A CAR <br> Our cars</h1>

        @livewire('cars', ['cars' => $cars])

    </div>
    </x-app-layout>
