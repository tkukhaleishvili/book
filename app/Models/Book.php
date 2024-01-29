<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;


     
    protected $fillable = [ 'name', 'status_id','released_year'];
    protected $with = ['authors','status'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
     public function users()
    {
        return $this->belongsTo(User::class);
    }




}
