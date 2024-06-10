<?php

namespace CLI;

require_once "ProjectBuilder.php";
require_once "Main.php";

$builder = new ProjectBuilder();
$main = new main($builder);

if ($argv[1] == "new") {
    $main->new();
}
