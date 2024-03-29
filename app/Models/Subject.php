<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'level_id', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subject) {
            $subject->slug = Str::slug($subject->name);
        });
    }


    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
