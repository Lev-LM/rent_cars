<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/stepstyle.css') }}">

    <div class="container">
        <div class="top-block">
                <ul class="row steps">
                    <li class="col-lg-3 pb-5">
                        <a class="step-item" href="{{route('dashboard')}}">
                      <span>
                        <p>1</p>
                        <span>Место <br>и сроки аренды</span>
                      </span>
                            <div class="step-line"></div>
                        </a>
                    </li>
                    <li class="col-lg-3 pb-5">
                        <div class="step-item active">
                      <span>
                        <p>2</p>
                        <span>Выбор <br>автомобиля</span>
                      </span>
                            <div class="step-line"></div>
                        </div>
                    </li>
                    <li class="col-lg-3 pb-5">
                        <div class="step-item">
                      <span>
                        <p>3</p>
                        <span>Информация <br>о водителе</span>
                      </span>
                            <div class="step-line"></div>
                        </div>
                    </li>
                    <li class="col-lg-3 pb-5">
                        <div class="step-item">
                      <span>
                        <p>4</p>
                        <span>Подтерждение <br>бронирования</span>
                      </span>
                        </div>
                    </li>
                </ul>
        </div>

        @livewire('filter-auto', ['typeId' => $typeId, 'data_in' => $data_in, 'data_out' => $data_out]);




    </div>
    </x-app-layout>
