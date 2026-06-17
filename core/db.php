<?php

function get_db(): PDO
{
    static $db = null;

    if ($db === null) {
        $db = new PDO('sqlite:' . ROOT . '/core/db.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    return $db;
}