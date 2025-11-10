<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выдача</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <main>
        <h1>Выдача экземляров</h1>
        <form>
            @csrf
            <fieldset>
                <legend>Поиск читателя</legend>
                <input type="search" name="search_reader" id="search_reader" placeholder="Фамилия читателя">
            </fieldset>
            <fieldset>
                <legend>Поиск книги</legend>
                <input type="search" name="search_book" id="search_book" placeholder="Название книги">
            </fieldset>
            <input type="submit" value="Найти">
        </form>
        <br>
        <form action="{{ route('accounting.getBooks') }}" method="post">
            @csrf
            <select name="reader_id" id="reader_id">
                @foreach ($readers->get() as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->lastname . ' ' . $reader->firstname . ' ' . $reader->patronymic}}</option>
                @endforeach
            </select>
            <select name="book_id" id="book_id">
                @foreach ($books->get() as $book)
                    <option value="{{ $book->id }}">{{ $book->fullname }}</option>
                @endforeach
            </select>
            <div>
                <label for="get_date">Дата выдачи</label>
                <input type="date" name="get_date" id="get_date">
            </div>
            <div>
                <label for="count">Число экземляров</label>
                <input type="number" name="count" id="count">
            </div>
            <input type="submit" value="Создать запись">
        </form>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </main>
</body>
</html>
