<section class="section">
    <div class="section-header">
        <h1>Crypto</h1>
    </div>

    <div class="section-body">
        <h4>Helper Crypto</h4>
        <b>Helper Crypto adalah function untuk melakukan encrypt data dua arah seperti base64</b><br>
        Untuk menggunakan Crypto Kalian harus setting key nya di env:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('CRYPTO_KEY=isi key unique');
        echo '</code>';
        echo '</pre>';
        ?>
        Import Crypto di controller masing masing:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Crypto;');
        echo '</code>';
        echo '</pre>';
        ?>
        Contoh Penggunaan Crypto:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('use Helpers\Crypto;
Encrypt : Crypto::encrypt("$data");
Decrypt : Crypto::decrypt("$data");');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
