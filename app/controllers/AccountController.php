<?php

require ROOT.'/vendor/autoload.php';
use chillerlan\QRCode\QRCode;

class AccountController {
    public function index() {
        if(empty($_SESSION['logged']) || empty($_SESSION['user_ID'])) {
            header('Location: /login');
            exit;
        }

        $db = get_db();
        $user_ID = $_SESSION['user_ID'];

        $user = get_user_info($db, $user_ID);
        $tickets = get_active_tickets($db, $user_ID);

        // if(($user['user_role']) === 'admin'){
        //     header('Location: /admin');
        //     exit;
        // }

        render('account', [
            'title'  => 'biletone | Konto',
            'user' => $user,
            'tickets' => $tickets
        ]);
    }

    public function inactivetickets(){
        if(empty($_SESSION['logged']) || empty($_SESSION['user_ID'])) {
            header('Location: /login');
            exit;
        }

        $db = get_db();
        $user_ID = $_SESSION['user_ID'];

        $user = get_user_info($db, $user_ID);
        $tickets = get_inactive_tickets($db, $user_ID);

        render('inactivetickets', [
            'title'  => 'biletone | Konto',
            'user' => $user,
            'tickets' => $tickets
        ]);
    }

    public function ticket($id){
        if(empty($_SESSION['logged']) || empty($_SESSION['user_ID']) || empty($id)){
            header('Location: /login');
            exit;
        }

        $db = get_db();

        $ticket = get_ticket($db, $id);

        if (!$ticket) {
            header('Location: /account');
            exit;
        }

        if($ticket['user_ID']!==$_SESSION['user_ID']){
            header('Location: /login');
            exit;
        }

        $token = $ticket['token'];

        $qr = (new QRCode)->render($token);

        render('ticket', [
            'title' => 'biletone | Bilet',
            'ticket' => $ticket,
            'qr' => $qr
        ]);
    }
}