@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form method="POST">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="last_name">Фамилия</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Введите фамилию">
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="first_name">Имя</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Введите имя">
                        </div>

                    </div>

                </div>

                <div class="form-group">
                    <label for="email">Электронный адрес</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Введите электронный адрес">
                </div>

                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Введите номер телефона">
                </div>

                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Введите адрес">
                </div>

                <div class="form-group">
                    <label for="types">Кружок</label>
                    <select class="form-control" id="types" name="type_id">
                        <option disabled selected>Выберете кружок</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Сообщение</label>
                    <textarea class="form-control" id="content" rows="9" name="content" placeholder="Ваше сообщение"></textarea>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input id="personal-data" type="checkbox" class="form-check-input" />
                        Разрешить обработку персональных данных
                    </label>
                </div>

                <button type="submit" class="btn btn-success">Подать заявление</button>

            </form>

        </div>
    </div>
@endsection
