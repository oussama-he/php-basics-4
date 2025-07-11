<?php

use Core\Response;
function dd($value)
{
    echo "<pre>";
    echo var_dump($value);
    echo "</pre>";
    die();
}

function isUrl($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/" . $path);
}
