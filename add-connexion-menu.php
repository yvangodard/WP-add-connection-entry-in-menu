<?php
/*
  Plugin Name:  Ajouter un lien de connexion au menu personnalisé 
  Description:  Cette fonction permet d’ajouter un lien de connexion au menu de navigation personnalisé de votre site WordPress
  Plugin URI:   http://goo.gl/MTznC1
  Version:      1.0
  Author:       Yvan GODARD
  Author URI:   http://www.yvangodard.me
 
  /*
  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
 
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
 
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */
 
 
// Pour sélectionner le menu dans lequel s'affiche le lien il faut modifier le hook wp_nav_menu_items par wp_nav_menu_{$menu->slug}_items où {$menu->slug} est égal au slug de votre menu.
// Par défaut wp_nav_menu_items
 
add_filter('wp_nav_menu_footer-menu_items', 'gkp_add_login_logout_link', 10, 2);
function gkp_add_login_logout_link($items, $args) {
 
    ob_start();
    wp_loginout('index.php');
    $loginout = ob_get_contents();
    ob_end_clean();
    $items .= '<li>'. $loginout .'</li>';
    return $items;
}