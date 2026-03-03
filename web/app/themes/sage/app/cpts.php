<?php

use App\CPT\Project;

$cptsGroup = [
    Project::class,
];

add_action('init', function () use ($cptsGroup) {
    foreach ($cptsGroup as $class) {
        (new $class())->register();
    }
});