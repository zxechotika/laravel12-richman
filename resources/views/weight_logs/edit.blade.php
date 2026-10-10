<x-weight>
    <x-slot:title>แก้ไขบันทึกน้ำหนัก</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark fw-bold">
                    <i class="bi bi-pencil-square me-1"></i> แก้ไขข้อมูลน้ำหนัก
                </div>
                <div class="card-body">
                    <form action="{{ route('weight.update', $log->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Field: Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">วันที่บันทึก <span
                                    class="text-danger">*</span></label>
                            <input type="date" name="date" id="date"
                                class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date', $log->date) }}">
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
                                    class="form-control @error('weight') is-invalid @enderror"
                                    value="{{ old('weight', $log->weight) }}">
                                <span class="input-group-text">kg</span>
                                @error('weight')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Field: Note -->
                        <div class="mb-3">
                            <label for="note" class="form-label">บันทึกเพิ่มเติม</label>
                            <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror">{{ old('note', $log->note) }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('weight.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> ยกเลิก
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> อัปเดตข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-weight>
