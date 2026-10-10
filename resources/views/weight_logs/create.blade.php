<x-weight>
    <x-slot:title>บันทึกน้ำหนักใหม่</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="bi bi-plus-circle me-1"></i> เพิ่มข้อมูลน้ำหนัก
                </div>
                <div class="card-body">
                    <form action="{{ route('weight.store') }}" method="POST">
                        @csrf

                        <!-- Field: Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label font-weight-bold">วันที่บันทึก <span
                                    class="text-danger">*</span></label>
                            <input type="date" name="date" id="date"
                                class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date', date('Y-m-d')) }}">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Field: Weight -->
                        <div class="mb-3">
                            <label for="weight" class="form-label">น้ำหนัก (กิโลกรัม) <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" step="0.1" name="weight" id="weight"
                                    class="form-control @error('weight') is-invalid @enderror" placeholder="เช่น 65.5"
                                    value="{{ old('weight') }}">
                                <span class="input-group-text">kg</span>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Field: Note -->
                        <div class="mb-3">
                            <label for="note" class="form-label">บันทึกเพิ่มเติม</label>
                            <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror"
                                placeholder="เช่น ออกกำลังกายเช้า, กิน buffet ช่วงเย็น">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('weight.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> ยกเลิก
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-save"></i> บันทึกข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-weight>
