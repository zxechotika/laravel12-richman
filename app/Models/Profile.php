<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // กำหนด column ที่อนุญาตให้บันทึกข้อมูลได้
    protected $fillable = [
        'name',
        'student_id',
        'image_url',
    ];
}
