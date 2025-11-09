<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Книги</title>
</head>
<body>
    <x-header></x-header>

    <h1>Книги</h1>
    <a href="{{ route('items.books.create') }}">Добавить книгу</a>
    <table border="1" style="border-collapse: collapse">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Автор</th>
            <th>Издатель</th>
            <th>Тип</th>
            <th>Год выпуска</th>
            <th>Кол-во страниц</th>
            <th>Кол-во экземпляров</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->fullname }}</td>
                <td>{{ $book->author->lastname . ' ' . $book->author->firstname . ' ' . $book->author->patronymic}}</td>
                <td>{{ $book->publishing->name }}</td>
                <td>{{ $book->type_of_book->name }}</td>
                <td>{{ $book->year_of_publish }}</td>
                <td>{{ $book->count_of_sheets }}</td>
                <td>{{ $book->count_of_items }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
