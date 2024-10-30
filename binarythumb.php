<?php
/*
Plugin Name: BinaryThumb
Plugin URI: http://www.blogdomaluco.com.br/
Description: This plugin was created to generate a thumbnail image of the first post, if it does not have any so it will not show anything.
Author: Elias de A. Rodrigues
Version: 0.2
Author URI: http://www.blogdomaluco.com.br/
*/

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

function BinaryStyleLoad(){
    echo "<link rel=\"stylesheet\" href=\"/wp-content/plugins/binarythumb/css/style.css\" type=\"text/css\" media=\"screen\" />";
}

function showThumbAndPost($post){

    global $id, $wpdb;
    $code = '';

    $query = '
    SELECT att.guid, att.post_title, pst.guid as url, pst.post_title as post
    FROM '.$wpdb->posts.' att
    JOIN '.$wpdb->posts.' pst ON pst.ID = att.post_parent
    WHERE att.post_parent = '.$id.' AND
    att.post_type = \'attachment\' AND
    att.post_mime_type LIKE \'%image%\'
    LIMIT 1
    ';

    $value = $wpdb->get_row($query);

    if($value->guid != ''){
        $code .='
        <a href="'.get_permalink().'" class="binary-thumb" title="'.$value->post.'">
            <img src="/wp-content/plugins/binarythumb/thumbnail.php?src='.$value->guid.'&w=80&zc=1" alt="'.$value->post_title.'" title="'.$value->post_title.'" />
        </a>';
    }else{
        $code .= '';
    }
    
    $value = $code.$post;

    echo $value;
}

function showThumb($post){

    global $id, $wpdb;
    $code = '';

    $query = '
    SELECT att.guid, att.post_title, pst.guid as url, pst.post_title as post
    FROM '.$wpdb->posts.' att
    JOIN '.$wpdb->posts.' pst ON pst.ID = att.post_parent
    WHERE att.post_parent = '.$id.' AND
    att.post_type = \'attachment\' AND
    att.post_mime_type LIKE \'%image%\'
    LIMIT 1
    ';

    $value = $wpdb->get_row($query);

    if($value->guid != ''){
        $code .='
        <a href="'.get_permalink().'" class="binary-thumb" title="'.$value->post.'">
            <img src="/wp-content/plugins/binarythumb/thumbnail.php?src='.$value->guid.'&w=80&zc=1" alt="'.$value->post_title.'" title="'.$value->post_title.'" />
        </a>';
    }else{
        $code .= '';
    }

    $value = $code;

    echo $value;
}


/*
 * Activate this methods
 */
add_action( 'wp_head', 'BinaryStyleLoad' );
apply_filters( 'the_content', 'the_excerpt' );
add_filter( 'the_excerpt', 'showThumbAndPost' );
add_filter( 'the_content_limit', 'showThumb' );

?>