<section class="section">
    <div class="section-header">
        <h1>Date</h1>
    </div>

    <div class="section-body">
        <h4>Helper Date</h4>
        <b>Helper Date digunakan untuk mempermudah manipulasi tanggal dan waktu seperti Carbon di Laravel.</b><br>

        Import Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Bpjs\Framework\Helpers\Date;');
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Date Now:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$now = Date::Now();');
        echo '<br>Mengambil tanggal dan waktu sekarang';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Hari:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$day = Date::Day();');
        echo '<br>Mengambil hari sekarang';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Bulan:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$month = Date::Month();');
        echo '<br>Mengambil bulan sekarang';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Ambil Tahun:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$year = Date::Year();');
        echo '<br>Mengambil tahun sekarang';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Parse Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28");');
        echo '<br>Parse string menjadi object date';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Format Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28")->format("d/m/Y");');
        echo '<br>Format tanggal sesuai kebutuhan';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Start Of Day:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28")->startOfDay();');
        echo '<br>Mengambil awal hari';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh End Of Day:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28")->endOfDay();');
        echo '<br>Mengambil akhir hari';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Start Of Month:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28")->startOfMonth();');
        echo '<br>Mengambil awal bulan';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh End Of Month:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28")->endOfMonth();');
        echo '<br>Mengambil akhir bulan';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh To Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::parse("2026-04-28 10:00:00")->toDate();');
        echo '<br>Ambil format tanggal saja';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh To Time:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$time = Date::parse("2026-04-28 10:00:00")->toTime();');
        echo '<br>Ambil format waktu saja';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Is Today:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$check = Date::parse("2026-04-28")->isToday();');
        echo '<br>Cek apakah tanggal hari ini';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Nama Hari:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$day = Date::DayName("2026-04-28");');
        echo '<br>Mengambil nama hari dalam bahasa Indonesia';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Is Past:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$check = Date::parse("2020-01-01")->isPast();');
        echo '<br>Cek apakah tanggal sudah lewat';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Is Future:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$check = Date::parse("2030-01-01")->isFuture();');
        echo '<br>Cek apakah tanggal masa depan';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Validasi Range Date:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$check = Date::isValidDateRange("2026-04-28", 14, 14);');
        echo '<br>Cek apakah tanggal masih dalam range';
        echo '</code>';
        echo '</pre>';
        ?>

        Contoh Create From Format:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$date = Date::createFromFormat("d/m/Y", "28/04/2026");');
        echo '<br>Membuat object date dari format tertentu';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>