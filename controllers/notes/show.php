<?php

use Core\Database;

$currentUser = 3;
$config = require base_path("config.php");
$db = new Database($config["database"], "root", "Princo-123");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $note = $db
        ->query("select * from notes where id = :id", ["id" => $_GET["id"]])
        ->findOrFail();

    authorize($currentUser === $note["user_id"]);

    $db->query("delete from notes where id = :id", [
        "id" => $_GET["id"],
    ]);

    header("location: /notes");
    exit();
} else {
    $note = $db
        ->query("select * from notes where id = :id ;", ["id" => $_GET["id"]])
        ->findOrFail();

    authorize($note["user_id"] === $currentUser);

    view("notes/show.view.php", ["heading" => "Note", "note" => $note]);
}
