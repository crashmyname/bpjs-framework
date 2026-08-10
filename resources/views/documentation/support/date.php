<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">📅</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Date Helper</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    Manipulasi tanggal & waktu semudah Carbon. Parse, format, compare, dan range checking.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Import -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Import
    </div>
    <div class="card-body-custom">
        <div class="code-block">
            <pre><code>use Bpjs\Framework\Helpers\Date;</code></pre>
        </div>
    </div>
</div>

<!-- Basic Methods -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-calendar-check text-warning"></i> Basic Date Methods
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:1.5rem;">🕐</div>
                        <h6 style="font-weight:700;margin-top:0.5rem;">Date::Now()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Tanggal & waktu saat ini</p>
                        <div class="code-block"><pre><code>$now = Date::Now();
// 2024-01-15 10:30:00</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:1.5rem;">📆</div>
                        <h6 style="font-weight:700;margin-top:0.5rem;">Date::Day() / Month() / Year()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Ambil komponen tanggal</p>
                        <div class="code-block"><pre><code>$day   = Date::Day();    // 15
$month = Date::Month();  // 01
$year  = Date::Year();   // 2024</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom text-center">
                        <div style="font-size:1.5rem;">📝</div>
                        <h6 style="font-weight:700;margin-top:0.5rem;">Date::DayName()</h6>
                        <p style="font-size:0.8rem;color:#64748b;">Nama hari (Bahasa Indonesia)</p>
                        <div class="code-block"><pre><code>$day = Date::DayName('2026-04-28');
// "Selasa"</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Parse & Format -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Parse & Format
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <h5 style="font-weight:700;">parse() — String to Date Object</h5>
                <div class="code-block">
                    <pre><code>$date = Date::parse('2026-04-28');
$date = Date::parse('2026-04-28 10:00:00');
$date = Date::parse('28 April 2026');</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="font-weight:700;">format() — Custom Format</h5>
                <div class="code-block">
                    <pre><code>$date = Date::parse('2026-04-28');

echo $date->format('d/m/Y');       // 28/04/2026
echo $date->format('d M Y');       // 28 Apr 2026
echo $date->format('l, d F Y');    // Selasa, 28 April 2026
echo $date->format('Y-m-d H:i:s'); // 2026-04-28 00:00:00</code></pre>
                </div>
            </div>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-6">
                <h5 style="font-weight:700;">createFromFormat()</h5>
                <p style="font-size:0.85rem;color:#64748b;">Parse dari format kustom:</p>
                <div class="code-block">
                    <pre><code>$date = Date::createFromFormat('d/m/Y', '28/04/2026');
$date = Date::createFromFormat('m-d-Y', '04-28-2026');
$date = Date::createFromFormat('d M Y', '28 Apr 2026');</code></pre>
                </div>
            </div>
            <div class="col-md-6">
                <h5 style="font-weight:700;">toDate() & toTime()</h5>
                <p style="font-size:0.85rem;color:#64748b;">Ambil bagian tanggal atau waktu:</p>
                <div class="code-block">
                    <pre><code>$dt = Date::parse('2026-04-28 10:30:00');

echo $dt->toDate();  // 2026-04-28
echo $dt->toTime();  // 10:30:00</code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start/End Of -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Start / End Of Methods
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">startOfDay() / endOfDay()</h6>
                        <div class="code-block">
                            <pre><code>$d = Date::parse('2026-04-28 14:30:00');

$d->startOfDay();
// 2026-04-28 00:00:00

$d->endOfDay();
// 2026-04-28 23:59:59</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">startOfMonth() / endOfMonth()</h6>
                        <div class="code-block">
                            <pre><code>$d = Date::parse('2026-04-28');

$d->startOfMonth();
// 2026-04-01 00:00:00

$d->endOfMonth();
// 2026-04-30 23:59:59</code></pre>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;height:100%;">
                    <div class="card-body-custom">
                        <h6 style="font-weight:700;">Use Case: Query Range</h6>
                        <div class="code-block">
                            <pre><code>// Data hari ini
$start = Date::parse('now')->startOfDay();
$end   = Date::parse('now')->endOfDay();

$orders = Order::query()
    ->whereBetween('created_at', $start, $end)
    ->get();</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Comparison Methods -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">4</span>
        Comparison & Validation
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">isToday()</h6>
                        <div class="code-block"><pre><code>$check = Date::parse('2024-01-15')
    ->isToday();
// true (jika hari ini)</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">isPast() / isFuture()</h6>
                        <div class="code-block"><pre><code>Date::parse('2020-01-01')->isPast();
// true

Date::parse('2030-01-01')->isFuture();
// true</code></pre></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-custom" style="border:1px solid #e2e8f0;">
                    <div class="card-body-custom text-center">
                        <h6 style="font-weight:700;">isValidDateRange()</h6>
                        <div class="code-block"><pre><code>// Cek range 14 hari ke depan
$valid = Date::isValidDateRange(
    '2026-04-28', 14, 14
);
// true</code></pre></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Methods Reference -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-book text-warning"></i> Methods Reference
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th>Method</th><th>Description</th><th>Example Output</th></tr>
                </thead>
                <tbody>
                    <tr><td><code>Date::Now()</code></td><td>Tanggal & waktu sekarang</td><td><code>2024-01-15 10:30:00</code></td></tr>
                    <tr><td><code>Date::Day()</code></td><td>Hari ini (angka)</td><td><code>15</code></td></tr>
                    <tr><td><code>Date::Month()</code></td><td>Bulan ini (angka)</td><td><code>01</code></td></tr>
                    <tr><td><code>Date::Year()</code></td><td>Tahun ini</td><td><code>2024</code></td></tr>
                    <tr><td><code>Date::DayName($date)</code></td><td>Nama hari (Bahasa Indonesia)</td><td><code>"Selasa"</code></td></tr>
                    <tr><td><code>Date::parse($string)</code></td><td>Parse string ke date object</td><td>DateTime object</td></tr>
                    <tr><td><code>Date::createFromFormat($f, $s)</code></td><td>Parse dari format kustom</td><td>DateTime object</td></tr>
                    <tr><td><code>->format($format)</code></td><td>Format tanggal</td><td><code>"28/04/2026"</code></td></tr>
                    <tr><td><code>->toDate()</code></td><td>Ambil bagian tanggal saja</td><td><code>"2026-04-28"</code></td></tr>
                    <tr><td><code>->toTime()</code></td><td>Ambil bagian waktu saja</td><td><code>"10:00:00"</code></td></tr>
                    <tr><td><code>->startOfDay()</code></td><td>Awal hari (00:00:00)</td><td><code>"2026-04-28 00:00:00"</code></td></tr>
                    <tr><td><code>->endOfDay()</code></td><td>Akhir hari (23:59:59)</td><td><code>"2026-04-28 23:59:59"</code></td></tr>
                    <tr><td><code>->startOfMonth()</code></td><td>Awal bulan</td><td><code>"2026-04-01 00:00:00"</code></td></tr>
                    <tr><td><code>->endOfMonth()</code></td><td>Akhir bulan</td><td><code>"2026-04-30 23:59:59"</code></td></tr>
                    <tr><td><code>->isToday()</code></td><td>Cek apakah hari ini</td><td><code>true / false</code></td></tr>
                    <tr><td><code>->isPast()</code></td><td>Cek apakah sudah lewat</td><td><code>true / false</code></td></tr>
                    <tr><td><code>->isFuture()</code></td><td>Cek apakah masa depan</td><td><code>true / false</code></td></tr>
                    <tr><td><code>Date::isValidDateRange($d, $a, $b)</code></td><td>Validasi range tanggal</td><td><code>true / false</code></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Complete Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">5</span>
        Complete Example: Order Report
    </div>
    <div class="card-body-custom">
        <div class="code-block" style="max-height:400px;overflow-y:auto;">
            <pre><code>use Bpjs\Framework\Helpers\Date;

class ReportController
{
    public function dailyReport()
    {
        // Range hari ini
        $start = Date::parse('now')->startOfDay();
        $end   = Date::parse('now')->endOfDay();

        $orders = Order::query()
            ->whereBetween('created_at',
                $start->format('Y-m-d H:i:s'),
                $end->format('Y-m-d H:i:s')
            )
            ->get();

        return view('reports/daily', [
            'date'   => Date::parse('now')->format('d F Y'),
            'day'    => Date::DayName('now'),
            'orders' => $orders,
            'total'  => count($orders),
        ]);
    }

    public function monthlyReport()
    {
        $start = Date::parse('now')->startOfMonth();
        $end   = Date::parse('now')->endOfMonth();

        $orders = Order::query()
            ->whereBetween('created_at',
                $start->format('Y-m-d H:i:s'),
                $end->format('Y-m-d H:i:s')
            )
            ->get();

        return view('reports/monthly', [
            'month'  => Date::parse('now')->format('F Y'),
            'orders' => $orders,
        ]);
    }
}</code></pre>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Master Date & Time</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Kombinasikan Date helper dengan ORM untuk query yang powerful.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('orm') ?>" style="background:white;color:#f59e0b;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-database"></i> ORM →
            </a>
            <a href="<?= route('validator') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-check-circle"></i> Validator →
            </a>
            <a href="<?= route('request') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;">
                <i class="bi bi-arrow-down-up"></i> Request →
            </a>
        </div>
    </div>
</div>