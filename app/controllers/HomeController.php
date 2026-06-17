<?php

class HomeController {
    public function index() {
        $db = get_db();
        $events = get_homepage_events($db);

        render('home', [
            'title'  => 'biletone | Strona główna',
            'events' => $events,
        ]);
    }
}