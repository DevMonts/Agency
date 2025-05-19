<?php
class LoginController
{
    public function form()
    {
        include __DIR__ . '/../views/login.php';
    }
    public function auth()
    {
        session_start();
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $user = User::findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = 'Invalid credentials';
            header('Location: /login');
            exit;
        }
        $_SESSION['user_id'] = $user['id'];
        header('Location: /dashboard');
        exit;
    }
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }
}
