<?php

namespace App\Fields;

use Extended\ACF\Fields\Gallery;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Location;

class CptProject
{
    public function register()
    {
        register_extended_field_group([
            'title' => 'CPT: Projet',
            'fields' => [
                Tab::make('Projet'),
                Text::make('Année', 'project__year'),
                Repeater::make('Galeries', 'project__galleries')
                    ->fields([
                        Gallery::make('Galerie', 'project__gallery')
                            ->maxFiles(3)
                            ->minFiles(1)
                            ->library('all')
                            ->format('id')
                    ])
                    ->button('Ajouter une ligne d\'images'),

                Tab::make('Zone hero homepage'),
                Image::make('Image mise en avant', 'project__hero_homepage_image')
                    ->format('id')
                    ->column(50),
                Text::make('Titre', 'project__hero_homepage_title')
                    ->column(50),
            ],
            'style' => 'default',
            'location' => [
                Location::where('post_type', 'project')
            ]
        ]);
    }
}