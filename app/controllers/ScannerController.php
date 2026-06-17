<?php

class ScannerController {
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

        render('scanner', [
            'admin' => true,
            'title'  => 'biletone | Administrator',
            'user' => $user
        ]);
    }

    public function check() {
        $token = $_POST['qr_code'] ?? '';

        if (empty($token)) {
            exit('NIEPOPRAWNY_BILET');
        }

        $db = get_db();

        $stmt = $db->prepare("
            SELECT * FROM tickets WHERE token = ?
        ");

        $stmt->execute([$token]);

        $ticket = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$ticket) {
            exit('NIEPOPRAWNY_BILET');
        }

        if ($ticket['status'] == 'used') {
            exit('BILET_JUZ_WYKORZYSTANY');
        }

        $stmt = $db->prepare("UPDATE tickets SET status = 'used' WHERE ticket_ID = ?");

        $stmt->execute([$ticket['ticket_ID']]);

        exit('WEJSCIE_OK');
    }
}