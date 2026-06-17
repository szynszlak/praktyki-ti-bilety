<?php

class EventsController {
    public function index() {
        $db = get_db();
        $events = get_all_events($db);

        render('events', [
            'title'  => 'biletone | Wydarzenia',
            'events' => $events,
        ]);
    }

    
    public function category($categoryID) {
        $db = get_db();

        $events = get_all_events_by_category($db, $categoryID);
        $category = get_category($db, $categoryID);
        $categoryName = 'w kategorii '. $category['category_name'];

        render('events', [
            'title' => 'biletone | Wydarzenia',
            'events' => $events,
            'categoryName' => $categoryName
        ]);
    }

    public function buy($eventID) {
        $db = get_db();

        $id = $_SERVER['REQUEST_METHOD'] === 'POST' ? $_POST['id'] : $eventID;

        $event = get_event($db, $id);

        if(empty($event)){
            header('Location: /events');
            exit;
        }

        if($event['tickets_amount'] <= 0){
            header('Location: /events');
            exit;
        }

        function generate_token(PDO $db): string {
            do {
                $token = bin2hex(random_bytes(16));
            } while (check_token($db, $token));

            return $token;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = generate_token($db);

            $event_ID = $_POST['id'];
            $user_ID = $_SESSION['user_ID'];

            if(buy_ticket($db, $user_ID, $event_ID, $token)){
                header('Location: /account');
                exit;
            }
            else{
                header('Location: /events');
                exit;
            }
        }

        render('buy', [
            'title' => 'Kup bilet | biletone',
            'event' => $event
        ]);
    }

    public function buyticket(){
        $db = get_db();

        $id = $_POST['id'];

        $event = get_event($db, $id);

        if(empty($event)){
            header('Location: /events');
            exit;
        }

        if($event['tickets_amount'] <= 0){
            header('Location: /events');
            exit;
        }

        function generate_token(PDO $db): string {
            do {
                $token = bin2hex(random_bytes(16));
            } while (check_token($db, $token));

            return $token;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = generate_token($db);

            $event_ID = $_POST['id'];
            $user_ID = $_SESSION['user_ID'];

            if(buy_ticket($db, $user_ID, $event_ID, $token)){
                if(update_amount($db, $event_ID)){
                    header('Location: /account');
                    exit;
                } else {
                    header('Location: /events');
                    exit;
                }
            }
            else{
                header('Location: /events');
                exit;
            }
        }
    }
}