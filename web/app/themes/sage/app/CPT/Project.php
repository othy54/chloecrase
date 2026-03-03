<?php

namespace App\CPT;

class Project
{

    public function register()
    {
        $this->register_cpt();
        $this->register_category_taxonomy_cpt();
    }

    private function register_cpt()
    {
        $labels = [
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'menu_name' => 'Projets',
            'add_new' => 'Ajouter un projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'edit_item' => 'Modifier le projet',
            'new_item' => 'Nouveau projet',
            'view_item' => 'Voir le projet',
            'search_items' => 'Rechercher des projets',
            'not_found' => 'Aucun projet trouvé',
            'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille',
            'all_items' => 'Tous les projets',
        ];

        $args = [
            /* ---------------------------------------------------------
                1. OPTIONS ESSENTIELLES (LE MINIMUM)
              ------------------------------------------------------------ */
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'menu_icon' => 'dashicons-art',
            'rewrite' => ['slug' => 'projet', 'with_front' => false],

            /* ---------------------------------------------------------
                2. OPTIONS OPTIONNELLES (POUR UN BOILERPLATE COMPLET)
              ------------------------------------------------------------ */
            'hierarchical' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'capability_type' => 'post',

            'query_var' => true,
            'map_meta_cap' => true,

            // Si vous voulez lier des taxonomies (ex: catégories d'événements)
            // 'taxonomies'       => ['category', 'post_tag'],
        ];

        register_post_type('project', $args);
    }

    private function register_category_taxonomy_cpt()
    {
        $labels = [
            'name' => 'Catégories de projet',
            'singular_name' => 'Catégorie de projet',
            'menu_name' => 'Catégories de projet',
            'all_items' => 'Toutes les catégories de projet',
            'edit_item' => 'Modifier la catégorie de projet',
            'view_item' => 'Voir la catégorie de projet',
            'update_item' => 'Mettre à jour la catégorie de projet',
            'add_new_item' => 'Ajouter une nouvelle catégorie de projet',
            'new_item_name' => 'Nom de la nouvelle catégorie de projet',
            'search_items' => 'Rechercher des catégories de projet',
            'popular_items' => 'Catégories de projet populaires',
            'separate_items_with_commas' => 'Séparer les catégories de projet par des virgules',
            'add_or_remove_items' => 'Ajouter ou supprimer des catégories de projet',
            'choose_from_most_used' => 'Choisir parmi les plus utilisés',
            'not_found' => 'Aucune catégorie de projet trouvé.',
        ];

        $args = [
            /* ---------------------------------------------------------
                1. OPTIONS ESSENTIELLES
              ------------------------------------------------------------ */
            'labels' => $labels,
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'rewrite' => ['slug' => 'categorie-projet'],

            /* ---------------------------------------------------------
                2. OPTIONS OPTIONNELLES (BOILERPLATE)
               ------------------------------------------------------------ */
            'show_ui' => true,
            'show_in_nav_menus' => true,
            'show_tagcloud' => true,
            'query_var' => true,
        ];

        // On lie la taxonomie au CPT 'project'
        register_taxonomy('project_category', ['project'], $args);
    }
}
