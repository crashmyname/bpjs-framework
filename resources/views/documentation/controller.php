<!-- Hero -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none; margin-bottom: 1.5rem;">
    <div class="card-body-custom" style="padding: 2rem;">
        <div style="display: flex; align-items: center; gap: 1.5rem; flex-wrap: wrap;">
            <div style="font-size: 3rem;">🎮</div>
            <div>
                <h2 style="font-weight: 800; margin: 0; color: white;">Controller</h2>
                <p style="opacity: 0.9; margin: 0.5rem 0 0; font-size: 0.95rem;">
                    The bridge between Models and Views. Handle requests, process data, and return responses.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- What is Controller -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-cpu text-info"></i> What is a Controller?
    </div>
    <div class="card-body-custom">
        <p>Controller adalah penghubung antara <strong>Model</strong> dan <strong>View</strong> dalam arsitektur MVC. Controller menerima request, memproses data melalui Model, dan mengembalikan response melalui View.</p>
        
        <div class="alert-custom alert-warning-custom">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div><strong>Sebelum lanjut:</strong> Pastikan kamu sudah memahami konsep <strong>Model-View-Controller (MVC)</strong> supaya lebih mudah mengikuti dokumentasi ini.</div>
        </div>
        
        <div style="text-align: center; padding: 1rem;">
            <svg width="500" height="100" viewBox="0 0 500 100" style="max-width:100%;">
                <rect x="10" y="25" width="120" height="50" rx="12" fill="#dbeafe" stroke="#3b82f6" stroke-width="2"/>
                <text x="70" y="55" text-anchor="middle" font-family="Inter,sans-serif" font-size="14" font-weight="700" fill="#1e40af">Request</text>
                
                <rect x="190" y="25" width="120" height="50" rx="12" fill="#d1fae5" stroke="#10b981" stroke-width="2"/>
                <text x="250" y="55" text-anchor="middle" font-family="Inter,sans-serif" font-size="14" font-weight="700" fill="#065f46">Controller</text>
                
                <rect x="370" y="25" width="120" height="50" rx="12" fill="#ede9fe" stroke="#7c3aed" stroke-width="2"/>
                <text x="430" y="55" text-anchor="middle" font-family="Inter,sans-serif" font-size="14" font-weight="700" fill="#6d28d9">Response</text>
                
                <line x1="130" y1="50" x2="188" y2="50" stroke="#64748b" stroke-width="2" marker-end="url(#arrow)"/>
                <line x1="310" y1="50" x2="368" y2="50" stroke="#64748b" stroke-width="2" marker-end="url(#arrow)"/>
                
                <defs>
                    <marker id="arrow" markerWidth="8" markerHeight="6" refX="8" refY="3" orient="auto">
                        <polygon points="0 0, 8 3, 0 6" fill="#64748b"/>
                    </marker>
                </defs>
            </svg>
        </div>
    </div>
</div>

<!-- Starter Template -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#0891b2;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">1</span>
        Controller Starter Template
    </div>
    <div class="card-body-custom">
        <p>Struktur dasar controller di BPJS Framework:</p>
        <div class="code-block">
            <pre><code>namespace App\Controllers;

use Bpjs\Framework\Core\Request;
use Bpjs\Framework\Helpers\View;
use Bpjs\Framework\Helpers\Session;
use Bpjs\Framework\Helpers\BaseController;
use App\Models\YourModel;

class YourController extends BaseController
{
    // Your methods here
}</code></pre>
        </div>
        
        <div class="row g-3 mt-2">
            <div class="col-md-3 col-6">
                <div style="background:#eff6ff;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#1e40af;font-size:0.85rem;">Request</div>
                    <div style="font-size:0.7rem;color:#64748b;">Handle input data</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#f0fdf4;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#166534;font-size:0.85rem;">View</div>
                    <div style="font-size:0.7rem;color:#64748b;">Render templates</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#fffbeb;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#92400e;font-size:0.85rem;">Session</div>
                    <div style="font-size:0.7rem;color:#64748b;">User state</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div style="background:#fef2f2;border-radius:8px;padding:0.75rem;text-align:center;">
                    <div style="font-weight:700;color:#991b1b;font-size:0.85rem;">Model</div>
                    <div style="font-size:0.7rem;color:#64748b;">Database access</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Old Model Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#f59e0b;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">2</span>
        Example: Using Old Model
    </div>
    <div class="card-body-custom">
        <p>Contoh controller dengan <strong>Model lama</strong> (instantiasi manual):</p>
        <div class="code-block" style="max-height: 500px; overflow-y: auto;">
            <pre><code>namespace App\Controllers;

use Bpjs\Framework\Core\Request;
use Bpjs\Framework\Helpers\View;
use Bpjs\Framework\Helpers\Session;
use App\Models\UserModel;

class UserController
{
    private $userModel;

    public function __construct()
    {
        // Instantiate model manually
        $this->userModel = new UserModel();
    }

    /**
     * Display all users
     */
    public function index()
    {
        $users = $this->userModel->getAllUsers();

        return view('users/index', [
            'title' => 'Data Users',
            'users' => $users,
        ]);
    }

    /**
     * Store new user
     */
    public function store(Request $request)
    {
        // Validate CSRF token
        if (!CSRFToken::validateToken($request->csrf_token)) {
            return View::error(419);
        }

        // Save via model
        $result = $this->userModel->addUser(
            $request->input('username'),
            $request->input('email'),
            $request->input('password')
        );

        if ($result) {
            Session::setFlash('success', 'User berhasil ditambahkan');
            redirect('/users');
        }

        Session::setFlash('error', 'Gagal menambahkan user');
        redirect('/users/create');
    }

    /**
     * Show single user
     */
    public function show($id)
    {
        $user = $this->userModel->findUser($id);

        if (!$user) {
            return View::error(404);
        }

        return view('users/show', [
            'title' => 'Detail User',
            'user'  => $user,
        ]);
    }
}</code></pre>
        </div>
        
        <div class="alert-custom alert-info-custom mt-3">
            <i class="bi bi-info-circle-fill"></i>
            <div>Pada Model lama, kamu perlu <strong>meng-instantiate model secara manual</strong> di constructor. Cocok untuk logic yang kompleks dengan dependency injection.</div>
        </div>
    </div>
</div>

<!-- New Model Example -->
<div class="card-custom">
    <div class="card-header-custom">
        <span style="background:#10b981;color:white;width:28px;height:28px;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:0.8rem;font-weight:700;margin-right:8px;">3</span>
        Example: Using New Model
    </div>
    <div class="card-body-custom">
        <p>Contoh controller dengan <strong>Model baru</strong> (static methods, lebih simpel):</p>
        <div class="code-block" style="max-height: 500px; overflow-y: auto;">
            <pre><code>namespace App\Controllers;

use Bpjs\Framework\Core\Request;
use Bpjs\Framework\Helpers\View;
use Bpjs\Framework\Helpers\Session;
use App\Models\User;

class UserController
{
    /**
     * Display all users
     */
    public function index()
    {
        $users = User::all();

        return view('users/index', [
            'title' => 'Data Users',
            'users' => $users,
        ]);
    }

    /**
     * Store new user
     */
    public function store(Request $request)
    {
        // Validate CSRF token
        if (!CSRFToken::validateToken($request->csrf_token)) {
            return View::error(419);
        }

        // Create via static method
        $result = User::create([
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_BCRYPT),
        ]);

        if ($result) {
            Session::setFlash('success', 'User berhasil ditambahkan');
            redirect('/users');
        }

        Session::setFlash('error', 'Gagal menambahkan user');
        redirect('/users/create');
    }

    /**
     * Show single user
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return View::error(404);
        }

        return view('users/show', [
            'title' => 'Detail User',
            'user'  => $user,
        ]);
    }

    /**
     * Update user
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return View::error(404);
        }

        $user->username = $request->input('username');
        $user->email    = $request->input('email');
        $user->save();

        Session::setFlash('success', 'User berhasil diupdate');
        redirect('/users');
    }

    /**
     * Delete user
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            Session::setFlash('success', 'User berhasil dihapus');
        }

        redirect('/users');
    }
}</code></pre>
        </div>
        
        <div class="alert-custom alert-success-custom mt-3">
            <i class="bi bi-check-circle-fill"></i>
            <div>Model baru menggunakan <strong>static methods</strong> — lebih clean, tidak perlu instantiasi manual. Direkomendasikan untuk project baru.</div>
        </div>
    </div>
</div>

<!-- Old vs New Comparison -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-arrow-left-right text-warning"></i> Old Model vs New Model
    </div>
    <div class="card-body-custom p-0">
        <div style="overflow-x:auto;">
            <table class="table-custom">
                <thead>
                    <tr><th style="width:30%;">Aspect</th><th style="width:35%;">Old Model</th><th style="width:35%;">New Model</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Initialization</strong></td>
                        <td><code>$model = new UserModel();</code></td>
                        <td><code>User::all()</code> (static)</td>
                    </tr>
                    <tr>
                        <td><strong>Query</strong></td>
                        <td><code>$model->getAllUsers()</code></td>
                        <td><code>User::all()</code></td>
                    </tr>
                    <tr>
                        <td><strong>Find</strong></td>
                        <td><code>$model->findUser($id)</code></td>
                        <td><code>User::find($id)</code></td>
                    </tr>
                    <tr>
                        <td><strong>Create</strong></td>
                        <td><code>$model->addUser(...)</code></td>
                        <td><code>User::create([...])</code></td>
                    </tr>
                    <tr>
                        <td><strong>Update</strong></td>
                        <td><code>$model->updateUser($id, ...)</code></td>
                        <td><code>$user->save()</code></td>
                    </tr>
                    <tr>
                        <td><strong>Delete</strong></td>
                        <td><code>$model->deleteUser($id)</code></td>
                        <td><code>$user->delete()</code></td>
                    </tr>
                    <tr>
                        <td><strong>Best For</strong></td>
                        <td><span class="badge-custom" style="background:#fef3c7;color:#92400e;">Complex logic with DI</span></td>
                        <td><span class="badge-custom" style="background:#d1fae5;color:#065f46;">Rapid development</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Best Practices -->
<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-star text-warning"></i> Best Practices
    </div>
    <div class="card-body-custom">
        <div class="row g-3">
            <div class="col-md-6">
                <div class="alert-custom alert-success-custom">
                    <i class="bi bi-check-lg"></i>
                    <div>
                        <strong>DO:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Gunakan <code>Request</code> class untuk input</li>
                            <li>Validasi data sebelum simpan</li>
                            <li>Gunakan named routes untuk redirect</li>
                            <li>Satu method = satu tanggung jawab</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert-custom alert-danger-custom">
                    <i class="bi bi-x-lg"></i>
                    <div>
                        <strong>DON'T:</strong>
                        <ul style="margin:0.25rem 0 0 1rem;font-size:0.85rem;">
                            <li>Jangan pakai <code>$_POST</code>/<code>$_GET</code> langsung</li>
                            <li>Jangan taruh logic bisnis di controller</li>
                            <li>Jangan lupa CSRF untuk POST requests</li>
                            <li>Jangan return view tanpa data yang jelas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Next Steps -->
<div class="card-custom" style="background: linear-gradient(135deg, #0891b2, #06b6d4); color: white; border: none;">
    <div class="card-body-custom" style="text-align: center; padding: 2rem;">
        <h3 style="font-weight: 800; margin-bottom: 0.5rem;">Master the MVC</h3>
        <p style="opacity: 0.9; margin-bottom: 1.5rem;">Pelajari Model dan View untuk melengkapi pemahaman MVC kamu.</p>
        <div style="display: flex; gap: 0.75rem; justify-content: center; flex-wrap: wrap;">
            <a href="<?= route('new-model') ?>" style="background:white;color:#0891b2;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-box"></i> New Model →
            </a>
            <a href="<?= route('view') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-eye"></i> View →
            </a>
            <a href="<?= route('route') ?>" style="background:rgba(255,255,255,0.2);color:white;padding:0.6rem 1.5rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;">
                <i class="bi bi-signpost-2"></i> Route →
            </a>
        </div>
    </div>
</div>