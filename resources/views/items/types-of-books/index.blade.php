<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Типы экземпляров</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <x-header></x-header>

    <main>
        <h1>Типы экземпляров</h1>
        <a href="{{ route('items.types-of-books.create') }}">Добавить тип</a>
        <table border="1" style="border-collapse: collapse" >
            <tr>
                <th>Типы экземпляров</th>
                <th>Книги</th>
            </tr>
            @foreach ($types as $type)
                <tr>
                    <td>{{ $type->name }}</td>
                    <td>
                        <ul>
                            @foreach ( $type->books as $book)
                                <li>
                                    {{ $book->fullname }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>
