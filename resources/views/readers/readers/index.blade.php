<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <x-header></x-header>

    <main>
        <h1>Читатели</h1>
        <a href="{{ route('readers.readers.create') }}">Добавить читателя</a>
        <table style="border-collapse: collapse" border="1">
            <tr>
                <th>Имя</th>
                <th>Тип читателя</th>
                <th>Группа</th>
                <th>Доступен для выдачи книг</th>
            </tr>
            @foreach ($readers as $reader)
                <tr>
                    <th>{{ $reader->lastname . ' ' . $reader->firstname . ' ' . $reader->patronymic}}</th>
                    <th>{{ $reader->type_of_reader == 'teacher' ? 'Учитель' : ($reader->type_of_reader == 'student' ? 'студент' : 'другой')}}</th>
                    <th>{{ $reader->group_id != null ? $reader->group->name : '-' }}</th>
                    <th>{{ $reader->can_get_books == true ? 'Доступен' : '-' }}</th>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>
