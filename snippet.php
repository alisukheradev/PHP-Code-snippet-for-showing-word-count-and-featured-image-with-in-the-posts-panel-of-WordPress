<?php
// Add new columns to the post list
add_filter('manage_posts_columns', function($columns) {
    $columns['word_count'] = 'Word Count';
    $columns['featured_image'] = 'Featured Image';
    return $columns;
});

// Populate the custom columns
add_action('manage_posts_custom_column', function($column, $post_id) {
    if ($column === 'word_count') {
        $content = get_post_field('post_content', $post_id);
        echo str_word_count(strip_tags($content));
    }

    if ($column === 'featured_image') {
        $thumbnail = get_the_post_thumbnail($post_id, [50, 50]);
        echo $thumbnail ?: '—';
    }
}, 10, 2);
?>
