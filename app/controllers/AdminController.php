<?php

class AdminController {
    public function index() {
        if(empty($_SESSION['logged']) || empty($_SESSION['user_ID'])){
            session_destroy();
            header('Location: /login');
            exit;
        }

        $db = get_db();

        $places = get_all_places($db);

        $user_ID = $_SESSION['user_ID'];
        $user = get_user_info($db, $user_ID);

        if($user['user_role']!=='admin'){
            header('Location: /account');
            exit;
        }

        render('admin', [
            'admin' => true,
            'title'  => 'biletone | Administrator',
            'events' => $events,
            'places' => $places,
            'user' => $user
        ]);
    }

    public function addevent() {
        if(empty($_SESSION['logged']) || empty($_SESSION['user_ID'])){
            session_destroy();
            header('Location: /login');
            exit;
        }

        $db = get_db();

        $places = get_all_places($db);

        $user_ID = $_SESSION['user_ID'];
        $user = get_user_info($db, $user_ID);

        if($user['user_role']!=='admin'){
            header('Location: /account');
            exit;
        }

        render('addevent', [
            'admin' => true,
            'title'  => 'biletone | Dodaj wydarzenie',
            'places' => $places,
            'user' => $user
        ]);
    }

    public function form() {
        $db = get_db();

            $errors = []; 

            $required_fields = ['nazwa', 'data', 'godzina', 'miejsce', 'kategoria', 'cena', 'ilosc'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || $_POST[$field] === '') {
                    $errors[] = "Pole '" . ucfirst($field) . "' jest wymagane i nie może być puste.";
                }
            }

            if (empty($errors)) {
                $nazwa = trim($_POST['nazwa']);
                if (strlen($nazwa) < 3 || strlen($nazwa) > 150) {
                    $errors[] = "Nazwa wydarzenia musi mieć od 3 do 150 znaków.";
                }

                $data_raw = trim($_POST['data']);
                $date_obj = DateTime::createFromFormat('d.m.Y', $data_raw);
                if (!$date_obj || $date_obj->format('d.m.Y') !== $data_raw) {
                    $errors[] = "Nieprawidłowy format lub nieistniejąca data. Użyj formatu DD.MM.YYYY (np. 14.07.2026).";
                } else {
                    $ddata = $date_obj->format('d.m');
                    $ydata = (int)$date_obj->format('Y');
                }

                $godzina_raw = trim($_POST['godzina']);
                if (!preg_match('/^(?:[01]\d|2[0-3]):[0-5]\d$/', $godzina_raw)) {
                    $errors[] = "Nieprawidłowa godzina. Użyj formatu HH:MM w zakresie 00:00 - 23:59 (np. 20:00).";
                } else {
                    $godzina = $godzina_raw;
                }

                $cena = $_POST['cena'];
                if (!is_numeric($cena) || (float)$cena < 0) {
                    $errors[] = "Cena biletów nie może być ujemna ani zawierać liter.";
                } else {
                    $cena = (float)$cena;
                }

                $ilosc = $_POST['ilosc'];
                if (filter_var($ilosc, FILTER_VALIDATE_INT) === false || (int)$ilosc <= 0) {
                    $errors[] = "Ilość biletów musi być liczbą całkowitą większą od zera (np. minimum 1).";
                } else {
                    $ilosc = (int)$ilosc;
                }

                $miejsce = $_POST['miejsce'];
                if ($miejsce === 'new') {
                    if (empty($_POST['new_place_name']) || empty($_POST['new_place_city']) || empty($_POST['new_place_address'])) {
                        $errors[] = "Wszystkie pola nowej lokalizacji muszą być wypełnione.";
                    }
                }

                if (isset($_FILES['grafika']) && $_FILES['grafika']['error'] === UPLOAD_ERR_OK) {
                    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    $ext = strtolower(pathinfo($_FILES['grafika']['name'], PATHINFO_EXTENSION));

                    if (!in_array($ext, $allowed_extensions)) {
                        $errors[] = "Dozwolone formaty obrazków to: " . implode(', ', $allowed_extensions) . ".";
                    } else {
                        $uploadDir = ROOT . '/public/img/events/';

                        $newName = date('Y-m-d_H-i-s') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;

                        $targetPath = $uploadDir . $newName;

                        if (!move_uploaded_file($_FILES['grafika']['tmp_name'], $targetPath)) {
                            $errors[] = "Nie udało się zapisać pliku.";
                        } else {
                            $grafika = $newName;
                        }
                    }
                } else {
                    $errors[] = "Musisz przesłać poprawny plik graficzny (plakat/logo).";
                }

            }

            if (empty($errors)) {
                try {
                    if ($miejsce === 'new') {
                        $p = trim($_POST['new_place_name']);
                        $c = trim($_POST['new_place_city']);
                        $a = trim($_POST['new_place_address']);

                        $miejsce = create_new_place($db, $p, $c, $a);
                    }

                    create_new_event($db, $nazwa, $ddata, $ydata, $godzina, $miejsce, $_POST['kategoria'], $cena, $ilosc, $grafika);

                    $success = "Pomyślnie dodano wydarzenie do bazy!";

                } catch (PDOException $e) {
                    $errors[]= "Błąd bazy danych";
                }
            } else {
                $error[] = "Nie udało się dodać wydarzenia:";
                foreach ($errors as $error) {
                    e($error);
                }
            }

            header('Location: /admin/addevent');
            exit;
    }
}