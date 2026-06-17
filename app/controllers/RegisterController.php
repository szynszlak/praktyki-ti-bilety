<?php

class RegisterController {
    public function index() {
        if(!empty($_SESSION['logged']) && !empty($_SESSION['user_ID'])){
            header('Location: /account');
            exit;
        }

        render('register', [
            'title'  => 'biletone | Rejestracja'
        ]);
    }

    public function register() {
        $db = get_db();

        function is_valid_email(string $email): bool
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = trim($_POST['email'] ?? '');
                $password = trim($_POST['password'] ?? '');
                $name = trim($_POST['name'] ?? '');
                $lastname = trim($_POST['lastname'] ?? '');

                if(empty($email) || empty($password) || empty($name) || empty($lastname)){
                    $_SESSION['error'] = 'Wypełnij wszystkie pola!';
                    header('Location: /register');
                    exit;
                }

                if (!is_valid_email($email)) {
                    $_SESSION['error'] = 'Niepoprawny email';
                    header('Location: /register');
                    exit;
                }

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $user = check_user_in_db($db, $email);
                if($user) {
                    $_SESSION['error'] = 'Taki użytkownik istnieje!';
                    header('Location: /register');
                    exit;
                }

                $register = register_in_db($db, $name, $lastname, $email, $hash);
                if(!$register) {
                    $_SESSION['error'] = 'Błąd!';
                    header('Location: /register');
                    exit;
                }

                $_SESSION['logged'] = true;
                $_SESSION['user_ID'] = $register;

                header('Location: /account');
                exit;
        }
        }

}