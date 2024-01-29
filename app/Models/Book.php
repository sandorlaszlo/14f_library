<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    // protected $table = "konyvek";
    // protected $primaryKey = "ID";

    public $timestamps = false;

    protected $fillable = ['title', 'pages', 'ISBN', 'year', 'category_id'];
    // protected $guarded = ['id'];

    /**
     * Get the category that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
        // return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * The authors that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'authors_books', 'book_id', 'author_id');
    }

    /**
     * The readers that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function readers(): BelongsToMany
    {
        return $this->belongsToMany(Reader::class, 'checkout', 'book_id', 'reader_id')
            ->withPivot(['start_time', 'end_time', 'is_returned']);
    }

}
