<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['review', 'rating'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected static function booted()
    {
        static::updated(
            function (Review $review) {
                $cacheKeyPrefix = "book:{$review->book_id}";

                cache()->forget($cacheKeyPrefix);
                cache()->forget("{$cacheKeyPrefix}:reviews:page_1");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_2");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_3");
            }
        );
        static::deleted(
            function (Review $review) {
                $cacheKeyPrefix = "book:{$review->book_id}";

                cache()->forget($cacheKeyPrefix);
                cache()->forget("{$cacheKeyPrefix}:reviews:page_1");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_2");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_3");
            }
        );
        static::created(
            function (Review $review) {
                $cacheKeyPrefix = "book:{$review->book_id}";

                cache()->forget($cacheKeyPrefix);
                cache()->forget("{$cacheKeyPrefix}:reviews:page_1");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_2");
                cache()->forget("{$cacheKeyPrefix}:reviews:page_3");
            }
        );
    }
}
