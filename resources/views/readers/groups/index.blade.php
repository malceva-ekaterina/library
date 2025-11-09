<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Группы</title>
</head>
<body>
    <x-header></x-header>

    <h1>Группы</h1>
    <a href="{{ route('readers.groups.create') }}">Добавить группу</a>
    <table border="1" style="border-collapse: collapse" >
        <tr>
            <th>Группа</th>
            <th>Читатели</th>
        </tr>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->name }}</td>
                <td>
                    <ul>
                        @foreach ( $group->readers() as $reader)
                            <li>
                                $reader->lastname
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
