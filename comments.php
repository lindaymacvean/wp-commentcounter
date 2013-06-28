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
    $posts_query = mysql_query("SELECT 'ID', 'post_title', count('comment_ID`)  FROM 'wp_posts' FULL JOIN 'wp_comments' ON 'wp_posts.ID'='wp_comments.comment_post_ID' ORDER BY 'comment_post_ID' ASC ");

    // Run a loop to fetch each row retrieved in the above query and store it in an array
    while ($row = mysql_fetch_assoc($posts_query)) {
        $posts[] = $row;
    }

    // Return this awesome information to the end-user :)
    while($comments_count['count']) {
		div(array(), array("result"));
			h("2", "The Post \"" . b($posts[2]) . "\" had a total of " . b($posts[3]) . " comments");
		close_div();
	}
		
end_html();
?>