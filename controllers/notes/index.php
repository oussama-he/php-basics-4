<?php
use Core\Database;

$config = require base_path("config.php");
$database = new Database($config["database"], "root", "Princo-123");

$notes = $database->query("select * from notes where user_id=3;", [])->get();

view("notes/index.view.php", ["heading" => "Notes", "notes" => $notes]);
