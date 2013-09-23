<?php
/**
* Navigation action
*
* 
* @package      Customizr
* @subpackage   classes
* @since        3.0
* @author       Nicolas GUILLAUME <nicolas@themesandco.com>
* @copyright    Copyright (c) 2013, Nicolas GUILLAUME
* @link         http://themesandco.com/customizr
* @license      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

class TC_nav {

    function __construct () {
        add_action  ( '__post_nav'                         , array( $this , 'tc_post_nav' ));
    }



    /**
     * The template part for displaying nav links
     *
     * @package Customizr
     * @since Customizr 3.0
     */
    function tc_post_nav() {
      
      //we don"t show post navigation for pages
      if(is_page(tc__f ( '__ID' ))) {
        return;
      }

      global $wp_query;

      $html_id = 'nav-below';

      if ( is_single()) : ?>
        <hr class="featurette-divider">

        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">

            <h3 class="assistive-text"><?php _e( 'Post navigation' , 'customizr' ); ?></h3>

            <ul class="pager">
              <?php if ( get_previous_post() != null ) : ?>
                <li class="previous">
                  <span class="nav-previous"><?php previous_post_link( '%link' , '<span class="meta-nav">' . _x( '&larr;' , 'Previous post link' , 'customizr' ) . '</span> %title' ); ?></span>
                </li>
              <?php endif; ?>
              <?php if ( get_next_post() != null ) : ?>
                <li class="next">
                  <span class="nav-next"><?php next_post_link( '%link' , '%title <span class="meta-nav">' . _x( '&rarr;' , 'Next post link' , 'customizr' ) . '</span>' ); ?></span>
                </li>
              <?php endif; ?>
            </ul>

        </nav><!-- #<?php echo $html_id; ?> .navigation -->

      <hr class="featurette-divider">

      <?php elseif ( $wp_query->max_num_pages > 1 ) : ?>

        <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">

          <h3 class="assistive-text"><?php _e( 'Post navigation' , 'customizr' ); ?></h3>

            <ul class="pager">

              <?php if(get_next_posts_link() != null) : ?>

                <li class="previous">
                  <span class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts' , 'customizr' ) ); ?></span>
                </li>

              <?php endif; ?>

              <?php if(get_previous_posts_link() != null) : ?>

                <li class="next">
                  <span class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>' , 'customizr' ) ); ?></span>
                </li>

              <?php endif; ?>

            </ul>
            
        </nav><!-- #<?php echo $html_id; ?> .navigation -->

      <?php endif;
    }

}//end of class
