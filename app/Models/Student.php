<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_id', 'name', 'email', 'password'];

    public function books()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
