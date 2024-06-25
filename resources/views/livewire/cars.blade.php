<div>



    <script>
        window.addEventListener('alertUpdate', (event) => {
            let data = event.detail;

            console.log(data);

            Swal.fire({
              icon: "error",
              title: "Упс...",
              text: "Укажите новую цену!",
              confirmButtonColor: "rgb(0, 80, 191)",
            });
        })
    </script>

    <script>
        window.addEventListener('alertApplication', (event) => {
            let data = event.detail;

            console.log(data);

            const { value: email } = await Swal.fire({
                title: "Input email address",
                input: "email",
                inputLabel: "Your email address",
                inputPlaceholder: "Enter your email address"
            });
                if (email) {
             Swal.fire(`Entered email: ${email}`);
            }


        })
    </script>


    <div class="car-container">
        <div class="car-block-filter">
            <button name="carId" class="@if ($buttonActive == 0) active-button @endif btn btn-car" wire:click="selectType({{ 0 }})">+Все авто</button>
            <button name="carId" class="@if ($buttonActive == 1) active-button @endif btn btn-car" wire:click="selectType({{ 1 }})">+Седаны</button>
            <button name="carId" class="@if ($buttonActive == 2) active-button @endif btn btn-car" wire:click="selectType({{ 2 }})">+Внедорожники</button>
            <button name="carId" class="@if ($buttonActive == 3) active-button @endif btn btn-car" wire:click="selectType({{ 3 }})">+Кроссовер</button>

        </div>




        @foreach ($selectedType as $car)
        <div class="car-items" id="{{$car->id}}">
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

                @if ($edit == $car->id)
                <input type="number" wire:model="editedCar" placeholder="Введите цену" value="{{ $car->cost_per_day}}">
                @endif
            <div class="car-button">
                <x-secondary-button wire:click='application'>
                    Арендовать в 1 клик!
                </x-secondary-button>
                @if ($edit == $car->id)
                <x-secondary-button wire:click='updateCar({{ $car->id }})'>
                    Update
                    </x-secondary-button>
                    <x-danger-button wire:click='deleteCar({{ $car->id }})'>
                    Delete
                    </x-danger-button>
                    <x-danger-button wire:click='cancelEdit'>
                    Cancel
                    </x-danger-button>
                @else
                <x-secondary-button color="green" wire:click='editCar({{ $car->id }})'>
                    Edit
                </x-secondary-button>
                @endif

            </div>
        </div>

        @endforeach
    </div>
</div>
