<?php
/**
 * Header Navigation template.
 *
 * @package Aquila
 */

$menu_class     = \Aquila_Theme\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'aquila-header-menu' );
$header_menus   = wp_get_nav_menu_items( $header_menu_id );
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <?php
          if (function_exists('the_custom_logo')) {
              the_custom_logo();
          }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                  if (!empty($header_menus) && is_array($header_menus)) {
                      foreach ($header_menus as $menu_item) {
                          if (!$menu_item->menu_item_parent) {
                              $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
                              $has_children = !empty($child_menu_items) && is_array($child_menu_items);
                              $link_target = !empty($menu_item->target) && '_blank' === $menu_item->target ? '_blank' : '_self';

                              if (!$has_children) {
                                  ?>
                                  <li class="nav-item">
                                      <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>"
                                          target="<?php echo esc_attr($link_target); ?>"
                                          title="<?php echo esc_attr($menu_item->title); ?>">
                                          <?php echo esc_html($menu_item->title); ?>
                                      </a>
                                  </li>
                                  <?php
                              } else {
                                  ?>
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>"
                                          id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                                          aria-expanded="false" target="<?php echo esc_attr($link_target); ?>"
                                          title="<?php echo esc_attr($menu_item->title); ?>">
                                          <?php echo esc_html($menu_item->title); ?>
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                          <?php
                                          foreach ($child_menu_items as $child_menu_item) {
                                              $link_target = !empty($child_menu_item->target) && '_blank' === $child_menu_item->target ? '_blank' : '_self';
                                              ?>
                                              <a class="dropdown-item"
                                                  href="<?php echo esc_url($child_menu_item->url); ?>"
                                                  target="<?php echo esc_attr($link_target); ?>"
                                                  title="<?php echo esc_attr($child_menu_item->title); ?>">
                                                  <?php echo esc_html($child_menu_item->title); ?>
                                              </a>
                                              <?php
                                          }
                                          ?>
                                      </div>
                                  </li>
                                  <?php
                              }
                          }
                      }
                  }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <!-- <?php get_search_form(); ?> -->
        </div>
    </div>
</nav>

<!-- 
<?php

	wp_nav_menu([
		'theme_location' => 'aquila-header-menu',
		'container_class' => 'my_header_menu_class'
	]);

?> 
-->