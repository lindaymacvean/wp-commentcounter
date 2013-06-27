<?php
function start_html($css = array()) {
    echo "<html>\n";
    
    if (!empty($css) && $css != "") {
        foreach ($css as $key => $value) {
            echo "       <head>\n";
            echo "          <link rel=\"stylesheet\" type=\"text/css\" href=\"css/" . $value . "\" />\n";
            echo "       </head>\n       ";
        }
    }

    echo "<body>\n         ";
}

function end_html() {
    echo "\n       </body>\n</html>";
}

function div($id, $class) {
    echo "<div";

    if (isset($id) && !empty($id) && $id != "") {
        echo " id=\"";
        foreach ($id as $key => $value) {
            echo $value;
        }
        echo "\"";
    }

    if (isset($class) && !empty($class) && $class != "") {
        echo " class=\"";
        foreach ($class as $key => $value) {
            echo $value;
        }
        echo "\"";
    }

    echo ">\n              ";
}

function close_div() {
    echo "\n         </div>";
}

function h($size, $content) {
    echo "<h", $size, ">", $content, "</h", $size, ">";
}

function b($content) {
    return "<strong>" . $content . "</strong>";
}

