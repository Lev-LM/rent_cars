<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/carstyle.css') }}">
    <div class="section-cars">
            <h1>RENT A CAR <br> Our cars</h1>

        <div class="car-container">
        @foreach ($cars as $car)
        <div class="car-info">
            <div class="car-left">
                <image width="600" height="600" src="{{ asset('/storage/images/products/'.$car->image) }}"></image>
            </div>
            <div class="car-right">
                <h2>Аренда {{ $car->brand. " ". $car->model}}</h2>
                <p> <b>Прокат {{ $car->brand. " ". $car->model}}</b> возможен на сутки и с правом выкупа. Прокат авто в Ульяновске без водителя, так и с водителем. Арендуйте {{ $car->brand. " ". $car->model}} на свадьбу, личных или рабочих поездок.</p>
                <div class="block-information">
                    <div class="left-information">
                        <div class="item-information">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANtJREFUSEvtlSEOAjEQRd9yARQa3OJQeE7CJcDDergEJ8GjcOBAo7gAC5O0CWmy6UxDaCCtazOZ1/9nOq3ItKpMXFLBA2DuLr0DblYBKWCBHoChg12BqRWeAl4Am0DhEthaVP8UOJvV4uhXm6sPTIBeRy0fwBG4a2ptqfEJqCNJz8D40+BWkxB0s8GiuIC7nFe5qApyhGL1/1u9dxJHb1+iVy1f48VtZpr3bmkun28NrILkzWsv5+pVwBqritXiUmmuaK+kPCcZEOGQkOHiB0wUKgEpYFXiWFA28BMGYzAf/2B21AAAAABJRU5ErkJggg=="/>
                            {{ $car->places}}
                        </div>
                        <div class="item-information">
                            <img width="25" height="25" src="https://flomaster.top/uploads/posts/2023-01/thumbs/1673395134_flomaster-club-p-korobka-peredach-risunok-instagram-1.png" alt="">
                            {{ $car->transmission}}
                        </div>
                        <div class="item-information">
                            <img width="25" height="25" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2KSFw1X4oim56JxZ6ceB6AM235_VDKHeJQvJ99jyZIg&s" alt="">
                            Бензин
                        </div>
                    </div>
                    <div class="right-information">
                        <h5>СТОИМОСТЬ ПРОКАТА {{ $car->brand. " ". $car->model}}</h5>
                        <div class="price-car">
                            От {{$car->cost_per_day}} руб
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
    </x-app-layout>
