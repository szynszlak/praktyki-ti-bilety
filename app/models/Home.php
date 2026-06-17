<?php

function get_homepage_events(PDO $db) {
    $stmt = $db->query('SELECT * FROM events e JOIN places p ON e.place_ID = p.place_ID ORDER BY RANDOM() LIMIT 4');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $rows;
}