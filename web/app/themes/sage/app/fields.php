<?php

use App\Fields\CptProject;
use App\Fields\Option;
use App\Fields\TemplateHome;

$fieldsGroup = [
    TemplateHome::class,
    CptProject::class,
    Option::class,
];

add_action('acf/include_fields', function () use ($fieldsGroup) {
    foreach ($fieldsGroup as $class) {
        (new $class())->register();
    }
});