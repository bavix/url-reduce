@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form method="POST">

                {{ csrf_field() }}

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
                    <label for="communication">Электронный адрес / Телефон / Адрес проживания</label>
                    <input required type="text" class="form-control" id="communication" name="communication" placeholder="Поле обратной связи">
                </div>

                <div class="form-group">
                    <label for="types">Кружок</label>
                    <select required class="form-control" id="types" name="type_id">
                        <option disabled selected>Выберете кружок</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="content">Текст</label>
                    <textarea required class="form-control" id="content" rows="9" name="content" placeholder="Ваш текст"></textarea>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input id="personal-data" type="checkbox" class="form-check-input" />
                        Разрешить обработку персональных данных
                    </label>
                </div>

                <button type="submit" class="btn btn-success" disabled data-personal>Отправить</button>

            </form>

        </div>
    </div>
@endsection
