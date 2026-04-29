<section class="section">
    <div class="section-header">
        <h1>Controller</h1>
    </div>

    <div class="section-body">
        <h4>Base Controller</h4>
        <b>Controller digunakan sebagai parent class untuk semua controller di aplikasi.</b><br>

        Import Controller:
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('namespace App\Controller;

use Bpjs\Framework\Helpers\BaseController;

class Controller extends BaseController {

}');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>1. Menampilkan View</h5>
        Contoh Penggunaan view():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('public function index()
{
    return $this->view("home.index", [
        "title" => "Dashboard"
    ]);
}');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>2. Menampilkan View dengan Layout</h5>
        Contoh Penggunaan view():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('return $this->view("home.index", [
    "title" => "Dashboard"
], "layouts.app");');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>3. Redirect URL</h5>
        Contoh Penggunaan redirect():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('return $this->redirect("/dashboard");');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>4. JSON Response</h5>
        Contoh Penggunaan jsonResponse():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('return $this->jsonResponse([
    "message" => "Success"
], 200);');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>5. Pretty Print Debug</h5>
        Contoh Penggunaan prettyPrint():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$data = ["name" => "Fervian"];
return $this->prettyPrint($data);');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>6. Upload File</h5>
        Contoh Penggunaan uploadFile():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$file = $_FILES["image"];
$upload = $this->uploadFile($file, "uploads/");');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>7. Generate Slug</h5>
        Contoh Penggunaan generateSlug():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$slug = $this->generateSlug("Hello World Laravel");');
// hasil: hello-world-laravel
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>8. Generate CSRF Token</h5>
        Contoh Penggunaan csrfToken():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('<form method="POST">
    <?=$this->csrfToken();?>
</form>');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>9. Generate Method Spoofing</h5>
        Contoh Penggunaan Method():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('<form method="POST">
    <?=$this->Method("PUT");?>
</form>');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>10. Hash Password</h5>
        Contoh Penggunaan hashPassword():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$hash = $this->hashPassword("123456");');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>11. Verify Password</h5>
        Contoh Penggunaan verifyPassword():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$verify = $this->verifyPassword("123456", $hash);');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>12. Format Currency</h5>
        Contoh Penggunaan formatCurrency():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('echo $this->formatCurrency(10000, "Rp");');
// hasil: Rp 10,000.00
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>13. Generate Random String</h5>
        Contoh Penggunaan generateRandomString():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$random = $this->generateRandomString(10);');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>14. Back Redirect</h5>
        Contoh Penggunaan back():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('return $this->back();');
        echo '</code>';
        echo '</pre>';
        ?>

        <h5>15. Security Headers</h5>
        Contoh Penggunaan setSecurityHeaders():
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow:auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('$this->setSecurityHeaders();');
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>