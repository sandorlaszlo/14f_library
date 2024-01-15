<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

}
