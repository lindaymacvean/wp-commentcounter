<?php
/*
 * Find the post with the most comments on WordPress
 * Copyright 2013 - Shane Curran
 */

// Load in the functions file
require_once "inc/functions.inc.php";
start_html(array("comments.css"));

     // Include the wp-config.php file
    require_once "../wp-config.php";

    // Eww, mysql_connect(). Remind me to replace this with PDO later
    $database = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                            mysql_select_db(DB_NAME);

    // Select all the posts from the database
    $posts_query = mysql_query("SELECT `ID`, `post_title` FROM `wp_posts`");

    // Run a loop to fetch each row retrieved in the above query and store it in an array
    while ($row = mysql_fetch_assoc($posts_query)) {
        $posts[] = $row;
    }

    $comments_count = array();

    // Run a loop to query the database to find how many comments each post has
    foreach ($posts as $key => $value) {
       $query  = mysql_query(sprintf("SELECT count(`comment_ID`) AS `comments` FROM `wp_comments` WHERE `comment_post_ID` = '%s'", $value['ID']));
       $results = mysql_fetch_assoc($query);

       $comments_count[] = array("count" => $results['comments'],
                                                    "post"   => $value['post_title']);
    }

    // Find the post with the most comments
    $most = max($comments_count);

    // Return this awesome information to the end-user :)
    div(array(), array("result"));
        h("2", "The most commented on post is \"" . b($most['post']) . "\" which had a total of " . b($most['count']) . " comments");
    close_div();

end_html();
?>
