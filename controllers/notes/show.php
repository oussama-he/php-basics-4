<?php

$currentUser = 3;
$config = require base_path("config.php");
$db = new Database($config["database"], "root", "Princo-123");

$note = $db
    ->query("select * from notes where id = :id ;", ["id" => $_GET["id"]])
    ->findOrFail();

authorize($note["user_id"] === $currentUser);

view("notes/show.view.php", ["heading" => "Note", "note" => $note]);
