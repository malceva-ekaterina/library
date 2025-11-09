<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторы</title>
    <style>
        table {
            border-collapse: collapse
        }
    </style>
</head>
<body>
    <x-header></x-header>

    <h1>Авторы</h1>
    <a href="{{ route('items.authors.create') }}">Добавить автора</a>
    <table border="1" style="border-collapse: collapse" >
        <tr>
            <th>Авторы</th>
            <th>Книги</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->lastname . ' ' . $author->firstname . ' ' . $author->patronymic }}</td>
                <td>
                    <ul>
                        @foreach ( $author->books as $book)
                            <li>
                                {{  $book->fullname}}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
