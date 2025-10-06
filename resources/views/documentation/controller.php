<section class="section">
    <div class="section-header">
        <h1>Controller</h1>
    </div>

    <div class="section-body">
        <h4>Controller</h4>
        <b>Didalam MVC akan saya contohkan controller dengan penggunaan <a href="<?= base_url()?>/dokumentasi/omodel">model lama</a> dan <a href="<?= base_url()?>/dokumentasi/nmodel">model baru</a></b><br>
        <p style="color:red">Sebelum lanjut ketahap ini pastikan kalian sudah memahami konsep Model-View-Controller supaya memudahkan anda</p>
        Starter Pack Controller :
    <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
    echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
    echo htmlentities('<?php');
    echo '<br>namespace Controller;

use Bpjs\Core\Request;
use Helpers\View;
use Helpers\CSRFToken;
use Helpers\Response;
use Helpers\BaseController;
use Model\YourModel;

class yourController extends BaseController
{
    <b style="color:skyblue">Your Function here</b>
}
?>';
    echo '</code>';
    echo '</pre>';
    ?>
        <h6>Contoh Controller menggunakan Model lama:</h6>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('<?php');
        echo '<br>';
        echo '
namespace Controller;

use Bpjs\Core\Request; <-- panggil fungsi request untuk menggantikan metode $_POST atau $_GET
use Helpers\View; <-- panggil fungsi View untuk melakukan return ke halaman tertentu ataupun melakukan redirect
use Helpers\CSRFToken; <-- panggil fungsi CSRFToken supaya aman ajah udah sih gituh doang
use Helpers\Response; <-- panggil fungsi response ini optional jika ingin melakuka return json dan lebih mudah
use Helpers\BaseController;
use Model\YourModel; <-- panggil model kamu

class UserController extends BaseController
{
    private $urModel;

    public function __construct()
    {
        $this->urModel = new YourModel();
    }

    public function index()
    {
        <b style="color:red">$user = $this->userModel->user();</b>
        View::render("user", ["user"=>$user],"layout"); //<-- View::render untuk mengembalikan ke halaman yang dituju misalnya user, 
        dan membawa parameter $user untuk menampilkan data, layout untuk menampilkan navbar jika dibutuhkan
    }
    public function store(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!CSRFToken::validateToken($request->csrf_token)) {
                View::render("errors/505",[]);
            }
                <b style="color:red">$result = $this->userModel->addUser($request->username, $request->email, $request->password);</b>
                if ($result) {
                    $user = $this->userModel->user();
                    View::redirectTo($_ENV["ROUTE_PREFIX"]."/user");
                } else {    
                    echo "Gagal menambahkan user";
                }
            }
        }
    }
}
?>';
        echo '</code>';
        echo '</pre>';
        ?>
        <h6>Contoh Controller menggunakan Model Baru:</h6>
        <?php echo '<pre style="background-color: #2d2d2d; color: #f8f8f2; padding: 10px; border-radius: 5px; overflow: auto;">';
        echo '<code style="font-family: Consolas, \'Courier New\', monospace;">';
        echo htmlentities('<?php');
        echo '<br>';
        echo '
namespace Controller;

use Helpers\Request; <-- panggil fungsi request untuk menggantikan metode $_POST atau $_GET
use Helpers\View; <-- panggil fungsi View untuk melakukan return ke halaman tertentu ataupun melakukan redirect
use Helpers\CSRFToken; <-- panggil fungsi CSRFToken supaya aman ajah udah sih gituh doang
use Helpers\Response; <-- panggil fungsi response ini optional jika ingin melakuka return json dan lebih mudah
use Helpers\BaseController;
use Model\YourModel; <-- panggil model kamu

class UserController extends BaseController
{
    public function index()
    {
        <b style="color:red">$user = User::all();</b>
        View::render("user", ["user"=>$user],"layout"); //<-- View::render untuk mengembalikan ke halaman yang dituju misalnya user, 
        dan membawa parameter $user untuk menampilkan data, layout untuk menampilkan navbar jika dibutuhkan
    }
    public function store(Request $request)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (!CSRFToken::validateToken($request->csrf_token)) {
                View::render("errors/505",[]);
            }
                <b style="color:red">$result = User::create([
                    "username" => $request->username,
                    "email" => $request->email,
                    "password" => $request->password
                ]);</b>
                if ($result) {
                    View::redirectTo($_ENV["ROUTE_PREFIX"]."/user");
                } else {    
                    echo "Gagal menambahkan user";
                }
            }
        }
    }
}
?>';
        echo '</code>';
        echo '</pre>';
        ?>
    </div>
</section>
