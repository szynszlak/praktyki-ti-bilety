<?php

function get_category(PDO $db, int $id): ?array
{
    $stmt = $db->prepare("SELECT * FROM categories WHERE category_ID = :id");
    $stmt->execute(['id' => $id]);

    $row = $stmt->fetch();
    return $row ?: null;
}

function get_all_events(PDO $db): ?array {
    $stmt = $db -> query('SELECT * FROM events e JOIN places p ON e.place_ID = p.place_ID WHERE e.tickets_amount > 0');
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

function get_all_events_by_category(PDO $db, int $id): ?array {
    $stmt = $db->prepare('SELECT * FROM events e JOIN places p ON e.place_ID = p.place_ID WHERE category_ID = :id AND e.tickets_amount > 0');
    $stmt->execute(['id' => $id]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_event(PDO $db, $id){
    $stmt = $db -> prepare('SELECT * FROM events e JOIN places p ON e.place_ID = p.place_ID WHERE event_ID = :id');
    $stmt -> execute(['id' => $id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buy_ticket(PDO $db, int $user_ID, int $event_ID, string $token): bool {
    try {
        $stmt = $db->prepare(
            "INSERT INTO tickets (token, user_ID, event_ID, status)
             VALUES (:token, :user_ID, :event_ID, 'active')"
        );

        return $stmt->execute([
            'token' => $token,
            'user_ID' => $user_ID,
            'event_ID' => $event_ID
        ]);
    } catch (PDOException $e) {
        return false;
    }
}

function update_amount(PDO $db, $event_ID) {
    try {
        $update = $db->prepare('UPDATE events SET tickets_amount=tickets_amount-1 WHERE event_ID = :id');
        return $update->execute(['id' => $event_ID]);
    } 
    catch (PDOException $e) {
        return false;
    }
}

function check_token(PDO $db, string $token): bool {
    $stmt = $db->prepare('SELECT 1 FROM tickets WHERE token = :token LIMIT 1');
    $stmt->execute(['token' => $token]);

    return (bool) $stmt->fetchColumn();
}