<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Издательства</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <x-header></x-header>

    <main>
        <h1>Издательства</h1>
        <a href="{{ route('items.publishings.create') }}">Добавить издательский дом</a>
        <table border="1" style="border-collapse: collapse" >
            <tr>
                <th>Издательство</th>
                <th>Книги</th>
            </tr>
            @foreach ($publishings as $publishing)
                <tr>
                    <td>{{ $publishing->name }}</td>
                    <td>
                        <ul>
                            @foreach ( $publishing->books as $book)
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
