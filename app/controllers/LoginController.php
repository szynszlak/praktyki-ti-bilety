<?php

class LoginController {
    public function index() {
        if(!empty($_SESSION['logged']) && !empty($_SESSION['user_ID'])){
            header('Location: /account');
            exit;
        }

        render('login', [
            'title'  => 'biletone | Logowanie'
        ]);
    }

    public function login() {
        $db = get_db();

        function is_valid_email(string $email): bool
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = trim($_POST['email'] ?? '');
                $password = trim($_POST['password'] ?? '');

                if(empty($email) || empty($password)){
                    $_SESSION['error'] = 'Wypełnij wszystkie pola!';
                    header('Location: /login');
                    exit;
                }

                if (!is_valid_email($email)) {
                    $_SESSION['error'] = 'Niepoprawny email';
                    header('Location: /login');
                    exit;
                }

                $user = check_user_in_db($db, $email);
                if(!$user) {
                    $_SESSION['error'] = 'Taki użytkownik nie istnieje!';
                    header('Location: /login');
                    exit;
                }

                if (!password_verify($password, $user['user_hash'])) {
                    $_SESSION['error'] = 'Błędne hasło!';
                    header('Location: /login');
                    exit;
                }

                $_SESSION['logged'] = true;
                $_SESSION['user_ID'] = $user['user_ID'];

                session_regenerate_id(true);

                header('Location: /account');
                exit;
        }

    }
}

