<div>
    <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action=" {{route('rent.store')}}" method="POST">
        @csrf
        <div class="search-block">
            <div class="search-item">
                <div class="form-group">
                    <label for="exampleInputEmail1">Тип автомобиля</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="type" wire:model="typeId">
                        <option value="">Укажите тип</option>
                        <option value="2">Внедорожник</option>
                        <option value="1" selected>Седан</option>
                        <option value="Кроссовер">Кроссовер</option>
                        <option value="Люкс">Люкс</option>
                        <option value="Эконом">Эконом</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="start">Start date:</label>
                    <input class="form-control" type="date" id="start" name="data-start" min="{{$date}}" max="2024-12-31" wire:model.live="pickupDate"/>
                </div>
                <div class="form-group">
                    <label for="start">Return date:</label>
                    <input class="form-control" type="date" id="start" name="data-out" value="{{$pickupDate}}"  min="{{$pickupDate}}" max="2024-12-31" wire:model.live="returnDate"/>
                </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </form>
</div>
