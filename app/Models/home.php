<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'todo_list',
    ];
    protected $table = 'homes';
    protected $image = 'images';
    /**
     * Define the relationship with the user who owns the todo.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
