<?php

function check_user_in_db(PDO $db, string $email) {
    $stmt = $db -> prepare('SELECT * FROM users WHERE user_email = :email');
    $stmt -> execute(['email' => $email]);

    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;    
}

function register_in_db(PDO $db, string $name, string $lastname, string $email, string $hash): int|false
{
    $stmt = $db->prepare("
        INSERT INTO users (user_name, user_lastname, user_email, user_hash, user_role)
        VALUES (:name, :lastname, :email, :hash, 'user')
    ");

    $ok = $stmt->execute([
        'name' => $name,
        'lastname' => $lastname,
        'email' => $email,
        'hash' => $hash
    ]);

    if (!$ok) {
        return false;
    }

    return (int) $db->lastInsertId();
}