
<?php

    class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
    {
        public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
        {
            $is_current_item = '';
            
            if (isset($item->classes)) {
                if (array_search('current-menu-item', $item->classes) != 0) {
                    $is_current_item = 'active';
                }
                echo '<li><a class=" ' . $is_current_item . ' " href="' . $item->url . '">' . $item->title;
            }
        }

        public function end_el(&$output, $item, $depth = 0, $args = array())
        {
            if (isset($item->classes)) {
                echo '</a></li>';
            }
        }
    }
