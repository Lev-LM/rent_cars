<div>
    <div class="rent-detals">
    <div class="left-block">
        <div class="left-items">
            <h6>Детали бронирования автомобиля</h6>
            <ul>
                <li>
                    <span>Место приема авто</span>
                    <p>Ульяновск</p>
                </li>
                <li>
                    <span>Дата приема</span>
                    <p>{{$data_in}}</p>
                </li>
                <li>
                    <span>Место возврата авто</span>
                    <p>В тоже место</p>
                </li>
                <li>
                    <span>Дата возврата</span>
                    <p>{{$data_out}}</p>
                </li>
            </ul>
        </div>
        <div class="left-items auto-model">
            <h6>Выбранное авто:</h6>
            @if($selectedCar)
            <ul>
                <li>
                    <h4>{{ $selectedCar->brand }} {{ $selectedCar->model }}</h4>
                    <image width="600" height="600" src="{{ asset('/storage/images/products/'.$selectedCar->image) }}"></image>
                    <!-- Отобразите другие свойства выбранного автомобиля здесь -->
                </li>
            </ul>
            <ul>
                <li>
                    <p>Аренда авто: {{$selectedCar->cost_per_day * $daysDifference}} руб.</p>
                </li>
            </ul>
            @endif
        </div>
    </div>

    @if ($userData)
        @if (!Auth::check())
            @if ($userRegisterStatus)
                @if (!$isRegisteredUser)
                <div class="container-register">
                    <h3>Заполните данные</h3>
                    <form wire:submit.prevent="creatingUser">
                        <ul>
                            <li>
                                <label for="name">Name:</label>
                                <input type="text" wire:model.defer="name" placeholder="Имя" />
                            </li>
                            <li>
                                <label for="tentacles">Number:</label>
                                <input type="number" wire:model.defer="number" placeholder="Number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required  wire:model.defer="number"/>
                            </li>
                        </ul>
                        <ul>
                            <li>
                                <label for="email">Enter your email:</label>
                                <input type="email" wire:model.defer="email" placeholder="Email" />
                            </li>
                            <li>
                                <label for="pass">Password:</label>
                                <input type="password" wire:model.defer="password" placeholder="Password" />
                            </li>
                        </ul>


                        <button class="btn-register" type="submit">Зарегистрироваться</button>
                    </form>
                    <button class="btn-login" wire:click="userRegister()">Уже есть аккаунт</button>
                </div>
                @endif
            @else
                <div class="container-login">
                <h3>Для продолжения бронирования вам нужно авторизоваться</h3>
                <form wire:submit.prevent="login">
                    <ul>
                        <li>
                            <label for="email">Enter your email:</label>
                            <input class="login-input" type="email" wire:model="email" placeholder="Email">
                        </li>
                        <li>
                            <label for="pass">Password:</label>
                            <input class="login-input" type="password" wire:model="password" placeholder="Пароль">
                        </li>
                    </ul>
                    <button class="btn-register" type="submit">Войти</button>
                </form>
                <small>Нету аккаунта?</small>
                <button class="btn-register" wire:click="userRegister()">Зарегистрироваться</button>
                </div>
            @endif
        @else
            @auth
                <div class="user-container">
                    <h6>Дополнительная информация</h6>
                    <ul>
                        <li>
                            <span>Имя клиента</span>
                            <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li>
                            <span>Почта клиента</span>
                            <p>{{ Auth::user()->email }}</p>
                        </li>
                        <li>
                            <span>Номер телефона</span>
                            <p>{{ Auth::user()->number }}</p>
                        </li>
                        <li>
                            <span>Дней аренды</span>
                            <p>{{ $daysDifference }}</p>
                        </li>
                    </ul>
                        @if ($rentStatus == false)
                        <button type="submit" class="btn btn-success ms-1" wire:click="rentSave">Забронировать</button>
                        @else
                        <p>Ваша заявка принята!</p>
                        <span><a href="/">Вернуться на главную</a></span>
                        @endif

                </div>
                {{-- Добро пожаловать, {{ Auth::user()->name }}!
                Ваш email: {{ Auth::user()->email }}
                <!-- Другие данные пользователя --> --}}
            @endauth

        @endif


    @else
    <div class="right-block">
        <div class="car-parameters">
            <h3>PARAMETERS CARS</h3>
            <div class="car-filter">
                <div class="filter">
                    <label for="exampleInputEmail1">Тип автомобиля</label>

                    <select class="form-control" id="exampleFormControlSelect1" name="type" wire:model.live="typeId">
                        <option value="0">Все авто</option>
                        <option value="2">Внедорожник</option>
                        <option value="1">Седан</option>
                        <option value="Кроссовер">Кроссовер</option>
                        <option value="Люкс">Люкс</option>
                        <option value="Эконом">Эконом</option>
                    </select>
                </div>
                <div class="filter">
                    <label for="exampleInputEmail1">Коробка передач</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type" wire:model.live="transmission">
                        <option value="0">Выбрать все</option>
                        <option value="АКП">Автоматическая</option>
                        <option value="МКП">Механическая</option>
                    </select>
                </div>
                <div class="filter">
                    <label for="exampleInputEmail1">Топливо</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type" wire:model.live="fuel">
                        <option value="">Все виды</option>
                        <option value="2" selected>Бензин</option>
                        <option value="1">Дизель</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="cars-list">
            @foreach ($cars as $car)
            <div class="car-item">
                <div class="car-left">
                    <div class="car-img">
                        <image width="300" height="300" src="{{ asset('/storage/images/products/'.$car->image) }}"></image>
                    </div>
                    <div class="car-information">
                        <h3>{{ $car->brand. " ". $car->model}}</h3>
                        <div class="car-elements">
                            <div class="item-elements">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANtJREFUSEvtlSEOAjEQRd9yARQa3OJQeE7CJcDDergEJ8GjcOBAo7gAC5O0CWmy6UxDaCCtazOZ1/9nOq3ItKpMXFLBA2DuLr0DblYBKWCBHoChg12BqRWeAl4Am0DhEthaVP8UOJvV4uhXm6sPTIBeRy0fwBG4a2ptqfEJqCNJz8D40+BWkxB0s8GiuIC7nFe5qApyhGL1/1u9dxJHb1+iVy1f48VtZpr3bmkun28NrILkzWsv5+pVwBqritXiUmmuaK+kPCcZEOGQkOHiB0wUKgEpYFXiWFA28BMGYzAf/2B21AAAAABJRU5ErkJggg=="/>
                                {{ $car->places}}
                                <img width="25" height="25" src="https://flomaster.top/uploads/posts/2023-01/thumbs/1673395134_flomaster-club-p-korobka-peredach-risunok-instagram-1.png" alt="">
                                {{ $car->transmission}}
                            </div>
                            <div class="item-elements">
                                <img width="25" height="25" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2KSFw1X4oim56JxZ6ceB6AM235_VDKHeJQvJ99jyZIg&s" alt="">
                                Бензин
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-right">
                    <span>
                        <h3>{{$car->cost_per_day}} Руб.</h3>
                        <p>цена в сутки</p>
                    </span>
                    <span>{{$car->cost_per_day * $daysDifference}} руб.
                    за все время</span>

                    <button name="carId" class="btn btn-car" wire:click="selectCar({{ $car->id }})">Выбрать</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    </div>
    @if (!$userData)
        @if($selectedCar)
            <button class="btn btn-user" wire:click="confirmation()">Подтвердить</button>
        @endif
    @endif

</div>
