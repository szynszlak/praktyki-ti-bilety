<?php 

function get_user_info(PDO $db, $user_ID) {
    $stmt = $db->prepare('SELECT * FROM users WHERE user_ID = :id');
    $stmt->execute(['id' => $user_ID]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_active_tickets(PDO $db, $user_ID) {
    $stmt = $db -> prepare("SELECT * FROM tickets t JOIN events e ON t.event_ID = e.event_ID JOIN categories c ON e.category_ID = c.category_ID JOIN places p ON e.place_ID = p.place_ID WHERE t.user_ID = :id AND t.status = 'active'");
    $stmt -> execute(['id' => $user_ID]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_inactive_tickets(PDO $db, $user_ID) {
    $stmt = $db -> prepare("SELECT * FROM tickets t JOIN events e ON t.event_ID = e.event_ID JOIN categories c ON e.category_ID = c.category_ID JOIN places p ON e.place_ID = p.place_ID WHERE t.user_ID = :id AND t.status = 'used'");
    $stmt -> execute(['id' => $user_ID]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_ticket(PDO $db, $id){
    $stmt = $db -> prepare('SELECT * FROM tickets t JOIN users u ON t.user_ID = u.user_ID JOIN events e ON t.event_ID = e.event_ID JOIN places p ON e.place_ID = p.place_ID WHERE t.ticket_ID = :id');
    $stmt -> execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}