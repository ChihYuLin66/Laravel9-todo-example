<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoContent extends Model
{
    use HasFactory;

    protected $fillable = ['todo_id', 'content'];

    public function todo()
    {
        return $this->belongsTo(Todo::class);
    }
}
