<?php

namespace App\Fields;

use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Relationship;
use Extended\ACF\Fields\Tab;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\WYSIWYGEditor;
use Extended\ACF\Location;

class TemplateHome
{
    public function register()
    {
        register_extended_field_group([
            'title' => 'Template: Accueil',
            'fields' => [
                Tab::make('Hero'),
                WYSIWYGEditor::make('Titre de la page', 'home__title')
                    ->disableMediaUpload()
                    ->toolbar(['bold', 'italic', 'underline', 'link']),
                Relationship::make('Projet à la une', 'home__project_front')
                    ->helperText('Ajouter un project à mettre à la une')
                    ->postTypes(['project'])
                    ->postStatus(['publish'])
                    ->elements(['featured_image'])
                    ->maxPosts(1)
                    ->format('object')
                    ->required(),

                Tab::make('Premier contenu'),
                Text::make('Titre de gauche', 'home__first_content_left_title'),
                WYSIWYGEditor::make('Premier texte', 'home__first_content_first_text')
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold']),
                WYSIWYGEditor::make('Second texte', 'home__first_content_second_text')
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold', 'italic', 'underline', 'link']),
                Image::make('Image', 'home__first_content_image')
                    ->format('id'),

                Tab::make('Là ou ça commence'),
                Text::make('Titre', 'home__where_begin_title'),
                WYSIWYGEditor::make('Texte', 'home__where_begin')
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold', 'italic', 'underline', 'link']),
                Image::make('Image (haut)', 'home__where_begin_image_1')
                    ->format('id')
                    ->column(33),
                Image::make('Image (haut/gauche)', 'home__where_begin_image_2')
                    ->format('id')
                    ->column(33),
                Image::make('Image (centre/gauche)', 'home__where_begin_image_3')
                    ->format('id')
                    ->column(33),
                Image::make('Image (bas/gauche)', 'home__where_begin_image_4')
                    ->format('id')
                    ->column(33),
                Image::make('Image (haut/droite)', 'home__where_begin_image_5')
                    ->format('id')
                    ->column(33),
                Image::make('Image (bas/droite)', 'home__where_begin_image_6')
                    ->format('id')
                    ->column(33),

                Tab::make('A propos'),
                Image::make('Photo', 'home__about_image')
                    ->format('id')
                    ->column(33),
                Text::make('Texte bleu', 'home__about_text_blue')
                    ->column(33),
                WYSIWYGEditor::make('Texte Je suis', 'home__about_text_iam')
                    ->column(33)
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold']),
                WYSIWYGEditor::make('Premier paragraphe', 'home__about_first_text')
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold', 'italic', 'underline', 'link']),
                WYSIWYGEditor::make('Deuxième paragraphe', 'home__about_second_text')
                    ->tabs('visual')
                    ->disableMediaUpload()
                    ->toolbar(['bold', 'italic', 'underline', 'link']),



            ],
            'style' => 'default',
            'hide_on_screen' => ['the_content'],
            'location' => [
                Location::where('page_type', 'front_page')
            ]
        ]);
    }
}