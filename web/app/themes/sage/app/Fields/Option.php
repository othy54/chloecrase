<?php

namespace App\Fields;

use Extended\ACF\Fields\Email;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\URL;
use Extended\ACF\Location;

class Option
{
    public function register()
    {
        acf_add_options_page([
            'icon_url' => 'dashicons-star-filled',
            'menu_slug' => 'option',
            'page_title' => 'Option',
            'position' => 21,
        ]);

        register_extended_field_group([
            'title' => 'Option',
            'fields' => [
                URL::make('WhatsApp', 'option__whatsapp')
                    ->column(50),
                Email::make('Email', 'option__email')
                    ->column(50),
                URL::make('Instagram', 'option__instagram')
                    ->column(50),
                URL::make('Linkedin', 'option__linkedin')
                    ->column(50),
            ],
            'style' => 'default',
            'location' => [
                Location::where('options_page', 'option'),
            ],
        ]);
    }
}