<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;

class WeightLogController extends Controller
{
    // 1. แสดงรายการบันทึกทั้งหมด
    public function index()
    {
        $logs = WeightLog::orderBy('date', 'asc')->get();
        return view('weight_logs.index', compact('logs'));
    }

    // 2. แสดงฟอร์มเพิ่มข้อมูล
    public function create()
    {
        return view('weight_logs.create');
    }

    // 3. บันทึกข้อมูลใหม่ พร้อม Validation
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|min:1|max:300',
            'note' => 'nullable|string|max:255',
        ], [
            'date.required' => 'กรุณาระบุวันที่บันทึก',
            'weight.required' => 'กรุณาระบุน้ำหนัก',
            'weight.numeric' => 'น้ำหนักต้องเป็นตัวเลขเท่านั้น',
            'weight.min' => 'น้ำหนักต้องมากกว่า 0 kg',
            'note.max' => 'บันทึกเพิ่มเติมต้องไม่เกิน 255 ตัวอักษร',
        ]);

        WeightLog::create($request->only(['date', 'weight', 'note', 'age', 'remark']));

        return redirect()->route('weights.index')->with('success', 'บันทึกน้ำหนักเรียบร้อยแล้ว');
    }

    // 4. แสดงฟอร์มแก้ไขข้อมูล
    public function edit($id)
    {
        $log = WeightLog::findOrFail($id);
        return view('weight_logs.edit', compact('log'));
    }

    // 5. อัปเดตข้อมูล พร้อม Validation
    public function update(Request $request, $id)
    {
        $log = WeightLog::findOrFail($id);

        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|min:1|max:300',
            'note' => 'nullable|string|max:255',
        ], [
            'date.required' => 'กรุณาระบุวันที่บันทึก',
            'weight.required' => 'กรุณาระบุน้ำหนัก',
            'weight.numeric' => 'น้ำหนักต้องเป็นตัวเลขเท่านั้น',
        ]);

        $log->update($request->only(['date', 'weight', 'note', 'age', 'remark']));

        return redirect()->route('weights.index')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    // 6. ลบข้อมูล
    public function destroy($id)
    {
        $log = WeightLog::findOrFail($id);
        $log->delete();

        return redirect()->route('weights.index')->with('success', 'ลบรายการบันทึกเรียบร้อยแล้ว');
    }
}