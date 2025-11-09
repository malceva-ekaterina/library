<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить автора</title>
</head>
<body>
    <x-header></x-header>
    <h1>Добавить автора</h1>
    <form action="{{ route('items.authors.store') }}" method="post">
        @csrf
        <div>
            <label for="lastname">Фамилия</label>
            <input type="text" name="lastname" id="lastname" required>
        </div>
        <div>
            <label for="firstname">Имя</label>
            <input type="text" name="firstname" id="firstname" required>
        </div>
        <div>
            <label for="patronymic">Отчество</label>
            <input type="text" name="patronymic" id="patronymic">
        </div>
        <input type="submit" value="Создать">
    </form>
</body>
</html>
