<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    protected $fillable = [
        'book_id',
        'student_id',
        'borrowed_at',
        'returned_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getUserName()
    {
        $user = $this->hasOne(User::class, 'id')->get()->first();
        if ($user) {
            return $user->name;
        }
    }
}
