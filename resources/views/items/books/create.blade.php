<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить книгу</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <main>
        <h1>Добавить книгу</h1>
        <form action="{{ route('items.books.store') }}" method="post">
            @csrf
            <div>
                <label for="fullname">Название</label>
                <input type="text" name="fullname" id="fullname">
            </div>
            <div>
                <label for="author_id">Автор</label>
                <select name="author_id">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->lastname . ' ' .$author->firstname . ' ' . $author->patronymic }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="publishing_id">Издательство</label>
                <select name="publishing_id">
                    @foreach ($publishings as $publishing)
                    <option value="{{ $publishing->id }}">{{ $publishing->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="type_of_book_id">Тип книги</label>
                <select name="type_of_book_id">
                    @foreach ($type_of_books as $type_of_book)
                        <option value="{{ $type_of_book->id }}">{{ $type_of_book->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="year_of_publish">Год публикации</label>
                <input type="number" name="year_of_publish" id="year_of_publish" min="1900" placeholder="2012">
            </div>
            <div>
                <label for="count_of_sheets">Кол-во страниц</label>
                <input type="number" name="count_of_sheets" id="count_of_sheets" min="1">
            </div>
            <div>
                <label for="count_of_items">Кол-во экземпляров</label>
                <input type="number" name="count_of_items" id="count_of_items" min="1" >
            </div>
            <input type="submit" value="Создать">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </form>
    </main>
</body>
</html>
