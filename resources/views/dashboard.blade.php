<x-app-layout>
    @yield('push')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<section class="section1" style="display: flex">
    <div class="first-block">
        <div class="first-text">
            <h1><b>{{ __('Renting cars have never been this easy')}}</b></h1>
        </div>
    </div>
    @livewire('my-component')

</section>


{{-- Популярные авто --}}
<section style="display: flex">
    <div class="cars-container">
        <h1>{{ __('POPULAR CARS')}}</h1>
        <div class="car-row">
            @foreach ($popularCar as $car)
            <div class="car-box">
                <image
                style="
                max-height: 13em;
                min-height: 13em;
                " src="{{ asset('/storage/images/products/'.$car->image) }}"></image>
                <h3>{{ __('Rent in Ulyanovsk')}}</h3>
                <h4>{{ __('The cost of renting a')}} {{$car->brand. " ". $car->model}} {{ __('in Ulyanovsk starts from')}} {{$car->cost_per_day}} {{ __('rubles per day')}}</h4>
                <h6>{{ __('The longer the car rental period, the lower the rental price per day')}}</h6>
            </div>
            @endforeach
        </div>
        <div class="cars-all">
            <button type="submit" class="btn btn-primary"><a href="cars/" class="btn">{{ __('View the entire fleet')}}</a></button>
        </div>
    </div>
</section>

</x-app-layout>
