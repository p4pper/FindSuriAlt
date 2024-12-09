<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory;

    protected $fillable=[
        "name",
        "name_ar",
        "born_on",
        "born_in",
        "arrested_at",
        "arrested_in",
        "images",
        "videos",
        "user_id",
    ];

    protected function casts(): array
    {
        return [
            'arrested_at' => 'date',
            'born_on' => 'date',
            'images' => 'array',
            'videos' => 'array',
        ];
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function born_in_city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'born_in');
    }
    public function arrested_in_city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'arrested_in');
    }
}
