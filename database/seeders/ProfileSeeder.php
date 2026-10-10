<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name' => 'Chotika Phonphalerd',
            'student_id' => '68222420010',
            'image_url' => 'https://i.pinimg.com/1200x/cc/5c/e5/cc5ce57931cbc5720cdd8c373980c5f1.jpg', // หรือใส่ path รูป เช่น '/images/profile.jpg'
        ]);
    }
}
