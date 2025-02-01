<?php

class rvr_mobile_menu_walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=[], $id=0) {

//        echo '<pre>'; var_dump($item); echo '</pre>';

        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        if ($item->url && $item->url != '#') {
            $output .= '<a href="' . $item->url . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $item->title;

        if ($item->url && $item->url != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }

        if ($args->walker->has_children) {
            $output .= '<div class="rvr_mmsubmenu_open_icon" id="openIcon' . $item->ID . '" data-state="closed"><wvicon class="icon-plus-square"></wvicon></div>';
        }
    }

    function end_el(&$output, $item, $depth=0, $args=null) {

        $output .= '</li>';

    }
}