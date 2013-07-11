<?php
/*
 * Find the post with the most comments on WordPress
 * Copyright 2013 - Shane Curran
 */
 
//start a session
session_start();

// Load in the functions file
require_once "inc/functions.inc.php";
start_html(array("comments.css"));

     // Include the wp-config.php file
    require_once "../wp-config.php";

    // Eww, mysql_connect(). Remind me to replace this with PDO later
    $database = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
                            mysql_select_db(DB_NAME);

    // Select all the posts from the database
    $posts_query = mysql_query("SELECT ID, post_title, comment_count FROM wp_posts ORDER BY comment_count DESC");

    // Run a loop to fetch each row retrieved in the above query and store it in an array
    while ($row = mysql_fetch_assoc($posts_query)) {
         // Return this awesome information to the end-user :)
		div(array(), array("result"));
			h("2", "The Post \"" . b($row['post_title']) . "\" had a total of " . b($row['comment_count']) . " comments");
		close_div();
    }
		
end_html();
?>
