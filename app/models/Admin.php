<?php
function get_all_places(PDO $db){
    $stmt = $db -> query('SELECT * FROM places');
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

function create_new_place(PDO $db, $place, $city, $address){
    $sql = "INSERT INTO places (place_name, place_city, place_address) VALUES (:p, :c, :a)";
    $query = $db->prepare($sql);
    $query->execute([
        ':p' => $place,
        ':c' => $city,
        ':a' => $address
    ]);
    return $db->lastInsertId();
}

function create_new_event(PDO $db, $nazwa, $ddata, $ydata, $godzina, $miejsce, $kategoria, $cena, $ilosc, $grafika){
    $sql = "INSERT INTO events (event_name, event_date, event_year, event_hour, place_ID, category_ID, tickets_price, tickets_amount, img) VALUES (:nazwa, :ddata, :ydata, :godzina, :miejsce, :kategoria, :cena, :ilosc, :grafika)";

    $query = $db->prepare($sql);
    $query->execute([
        ':nazwa' => $nazwa,
        ':ddata' => $ddata,
        ':ydata' => $ydata,
        ':godzina' => $godzina,
        ':miejsce' => $miejsce,
        ':kategoria' => $kategoria,
        ':cena' => $cena,
        ':ilosc' => $ilosc,
        ':grafika' => $grafika
    ]);
}