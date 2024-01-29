<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'name','status',];
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
     public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
