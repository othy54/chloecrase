<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_filter('image_size_names_choose', function ($sizes) {
    return array_merge($sizes, [
        'custom-2560' => '2560px',
        'custom-1920' => '1920px',
        'custom-1440' => '1440px',
        'custom-1280' => '1280px',
        'custom-1024' => '1024px',
        'custom-768' => '768px',
        'custom-374' => '374px',
    ]);
});

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');