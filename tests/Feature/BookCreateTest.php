<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Publishing;
use App\Models\Type_of_book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_creates_book_with_valid_data()
    {
        $typeOfBook = Type_of_book::factory()->create();
        $author = Author::factory()->create();
        $publishing = Publishing::factory()->create();
        // Arrange
        $bookData = [
            'fullname' => 'Тестовая книга',
            'type_of_book_id' => $typeOfBook->id,
            'author_id' => $author->id,
            'publishing_id' => $publishing->id,
            'year_of_publish' => 2023,
            'count_of_sheets' => 300,
            'count_of_items' => 10,
        ];

        // Act
        $response = $this->post('/items/books', $bookData);

        // Assert
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('books', [
            'fullname' => 'Тестовая книга',
            'year_of_publish' => 2023,
        ]);
    }
}
