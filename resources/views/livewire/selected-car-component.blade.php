<div>
    <div class="left-items">
        <h6>Выбранное авто:</h6>
        <ul>
            <li>
                @if($selectedCar)
                <h2>Выбранный автомобиль: {{ $selectedCar->brand }}</h2>
                <!-- Отобразите другие свойства выбранного автомобиля здесь -->
                @endif
            </li>
        </ul>
    </div>
</div>
