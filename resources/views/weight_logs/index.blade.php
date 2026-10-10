<x-weight>
    <x-slot:title>หน้าแรก - ติดตามน้ำหนักร่างกาย</x-slot:title>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4 text-dark mb-0"><i class="bi bi-graph-up me-2"></i>ประวัติและแนวโน้มน้ำหนัก</h2>
        <a href="{{ route('weight.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> บันทึกน้ำหนักใหม่
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Google Chart Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-bar-chart-line me-1"></i> กราฟแสดงการเปลี่ยนแปลงน้ำหนัก
        </div>
        <div class="card-body">
            @if ($logs->count() > 0)
                <div id="curve_chart" style="width: 100%; height: 350px"></div>
            @else
                <div class="text-center text-muted py-4">ยังไม่มีข้อมูลสำหรับแสดงกราฟ</div>
            @endif
        </div>
    </div>

    <!-- Table Section -->
    <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold">
            <i class="bi bi-list-ul me-1"></i> รายการบันทึกทั้งหมด
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>วันที่</th>
                            <th>น้ำหนัก (กก.)</th>
                            <th>บันทึกเพิ่มเติม</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $index => $log)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($log->date)->format('d/m/Y') }}</td>
                                <td><span class="badge bg-primary fs-6">{{ number_format($log->weight, 2) }} kg</span>
                                </td>
                                <td>{{ $log->note ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('weight.edit', $log->id) }}"
                                        class="btn btn-sm btn-outline-warning me-1">
                                        <i class="bi bi-pencil"></i> แก้ไข
                                    </a>
                                    <form action="{{ route('weight.destroy', $log->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('ยืนยันการลบรายการนี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> ลบ
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">ยังไม่มีการบันทึกข้อมูลน้ำหนัก
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['วันที่', 'น้ำหนัก (kg)'],
                    @foreach ($logs as $log)
                        ['{{ \Carbon\Carbon::parse($log->date)->format('d/m/Y') }}', {{ $log->weight }}],
                    @endforeach
                ]);

                var options = {
                    title: 'แนวโน้มน้ำหนักตัว (kg)',
                    curveType: 'function',
                    legend: {
                        position: 'bottom'
                    },
                    colors: ['#0d6efd'],
                    pointSize: 6,
                    vAxis: {
                        title: 'น้ำหนัก (กิโลกรัม)'
                    },
                    hAxis: {
                        title: 'วันที่'
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
        </script>
    @endpush

</x-weight>
