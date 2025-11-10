<header class="header">
    <a href="{{ route('index') }}">Главная</a>
    <div>
        <a href="{{ route('items.books.index') }}">Книги</a>
        <a href="{{ route('items.authors.index') }}">Автор</a>
        <a href="{{ route('items.publishings.index') }}">Издательские дома</a>
        <a href="{{ route('items.types-of-books.index') }}">Типы книг</a>
    </div>
    <div>
        <a href="{{ route('readers.groups.index') }}">Группы</a>
        <a href="{{ route('readers.readers.index') }}">Читатели</a>
    </div>
    <a href="{{ route('accounting.index') }}">Журнал выдачи</a>
</header>

