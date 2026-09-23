---
name: ci4-auth-session
description: Dipakai saat diminta membuat fitur login, logout, register, atau pembatasan akses berdasarkan role (admin/user) di CodeIgniter 4 memakai session dan Filter.
---
# Skill: Auth dan Session CI4

Tabel `users` minimal: `id`, `nama`, `email` (unique), `password`, `role` (`admin`/`user`), timestamps.

## Urutan
1. Migration `users` + seeder 1 akun admin (password di-hash)
2. `UserModel`
3. Controller `Auth` (login, attempt, logout, opsional register)
4. Filter `AuthFilter` + daftar alias
5. Pasang filter di route
6. Tes: akses halaman tanpa login harus ke-redirect ke login

## Controller `Auth`
```php
public function login()
{
    return view('auth/login', ['title' => 'Login']);
}

public function attempt()
{
    $rules = ['email' => 'required|valid_email', 'password' => 'required'];
    if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    $user = (new \App\Models\UserModel())->where('email', $this->request->getPost('email'))->first();

    if (! $user || ! password_verify($this->request->getPost('password'), $user['password'])) {
        return redirect()->back()->withInput()->with('errors', ['Email atau password salah']);
    }

    session()->regenerate();
    session()->set([
        'user_id'   => $user['id'],
        'nama'      => $user['nama'],
        'role'      => $user['role'],
        'logged_in' => true,
    ]);
    return redirect()->to('/dashboard');
}

public function logout()
{
    session()->destroy();
    return redirect()->to('/login');
}
```
Saat register/seed: `'password' => password_hash($pw, PASSWORD_DEFAULT)`.

## Filter `app/Filters/AuthFilter.php`
```php
<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('logged_in')) {
            return redirect()->to('/login')->with('errors', ['Silakan login dulu']);
        }
        // pemakaian: 'filter' => 'auth:admin'
        if (! empty($arguments) && ! in_array(session()->get('role'), $arguments, true)) {
            return redirect()->to('/dashboard')->with('errors', ['Akses ditolak']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
```

## Daftarkan di `app/Config/Filters.php`
```php
public array $aliases = [
    // ...bawaan...
    'auth' => \App\Filters\AuthFilter::class,
];
```

## Pakai di route
```php
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->get('logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
});
$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    // route khusus admin
});
```
