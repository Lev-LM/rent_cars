<x-app-layout>
    @yield('push')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<section style="display: flex">
    <div class="first-block">
        <div class="first-text">
            <h1><b>Renting cars have never been this easy</b></h1>
            <h3>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</h3>
        </div>
    </div>
    @livewire('my-component')
</section>

{{-- Популярные авто --}}
<section style="display: flex">
    <div class="cars-container">
        <h1>POPULAR CARS</h1>
        <div class="car-row">
            <div class="car-box">
                <img src="https://ulyanovsk.marscar.ru/assets/components/phpthumbof/cache/2add2450529afb08d897d3906e0d15c7.a99f64ac8c28a23947106755c031f496.jpg" alt="">
                <h3>Аренда в Ульяновске</h3>
                <h4>Стоимость проката KIA Rio в Ульяновске от 2700 руб. сутки</h4>
                <h6>Чем больше срок арнеды авто, тем ниже стоимость аренды за сутки</h6>
            </div>
            <div class="car-box">
                <img src="https://ulyanovsk.marscar.ru/assets/components/phpthumbof/cache/e84cae5d5ee2eef7c226d6542dcdd719.a99f64ac8c28a23947106755c031f496.jpg" alt="">
                <h3>Аренда в Ульяновске</h3>
                <h4>Стоимость проката KIA Rio в Ульяновске от 2700 руб. сутки</h4>
                <h6>Чем больше срок арнеды авто, тем ниже стоимость аренды за сутки</h6>
            </div>
            <div class="car-box">
                <img src="https://ulyanovsk.marscar.ru/assets/components/phpthumbof/cache/abe9b72adcb7d7cf14eefddba562db7f.a99f64ac8c28a23947106755c031f496.jpg" alt="">
                <h3>Аренда в Ульяновске</h3>
                <h4>Стоимость проката KIA Rio в Ульяновске от 2700 руб. сутки</h4>
                <h6>Чем больше срок арнеды авто, тем ниже стоимость аренды за сутки</h6>
            </div>
        </div>
        <div class="cars-all">
            <button type="submit" class="btn btn-primary"><a href="cars/" class="btn">Посмотреть весь автопарк</a></button>
        </div>
    </div>
</section>

</x-app-layout>
