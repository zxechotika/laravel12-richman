<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AboutMeController extends Controller
{
    public function index()
    {
        $profile = null;

        // เช็คก่อนว่ามีตาราง profiles อยู่ในระบบจริงหรือไม่ ป้องกัน Query Exception
        if (Schema::hasTable('profiles')) {
            $profile = DB::table('profiles')->first();
        }

        // กรณีที่ยังไม่มีตาราง หรือไม่มีข้อมูลในตาราง ให้กำหนดค่า Default ชั่วคราวทันที
        if (!$profile) {
            $profile = (object) [
                'name' => 'Chotika Phonphalerd',
                'student_id' => '68222420010',
                'image_url' => 'https://pin.it/1ywznd5Wx',
            ];
        }

        return view('about-me', compact('profile'));
    }
}