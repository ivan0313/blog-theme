<?php
/*
Template Name: Home Page
Template Post Type: page
*/

get_header(); ?>

    <div class="site-content">
        
        <div class="hero">

            <div class="hero-introduction">
                <h1>Ivan</h1>
                
                <h2>Software Engineer</h2>

                <div class="detail-introduction">
                    Welcome! This is a personal portfolio page displaying my projects and CV, 
                    as well as a demonstration of my humble knowledge in front-end web development.
                    This site is implemented using wordpress and a custom theme. 
                </div>

                <div class="iam">
                    <p>Here is a</p>
                    <b>
                    <div class="innerIam">
                        animations<br /> 
                        that<br />
                        will<br />
                        keep<br />
                        moving
                        </div>
                    </b>
                </div><!-- I am animation -->

            </div>

            <div class="avatar">
                <?php 
                    if( has_post_thumbnail() ):
                        echo get_the_post_thumbnail();
                    endif; 
                ?>
                <div class="avatar-left"></div>
                <div class="avatar-right"></div>
            </div>

        </div><!-- Hero -->

        <div class="projects">
            <h2>Projects</h2>
            <div class="content-area-wrapper">
                <div class="content-area">
                    <?php 
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'category_name' => 'feature-projects',
                            'posts_per_page' => 5,
                            'order' => 'ASC',
                        );
                        $arr_feature_proj_posts = new WP_Query( $args );
                        
                        if ( $arr_feature_proj_posts->have_posts() ) :
                        
                            while ( $arr_feature_proj_posts->have_posts() ) :
                                $arr_feature_proj_posts->the_post();
                                ?>
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <?php
                                    if ( has_post_thumbnail() ) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                    <header class="entry-header">
                                        <h1 class="entry-title"><?php the_title(); ?></h1>
                                    </header>
                                    <?php
                                        $taxonomies = get_the_terms(get_the_ID(), 'post_tag');
                                        // get_terms( array(
                                        //     'taxonomy' => 'post_tag',
                                        //     'hide_empty' => true,
                                        // ) );

                                        if ( !empty($taxonomies) ) :
                                            $output = '<div>';
                                            foreach( $taxonomies as $tag ) {
                                                if( $tag->parent == 0 ) {
                                                    $output.='<div>'. esc_attr( $tag->name ) . '</div>';
                                                }
                                            }
                                            $output.='</div>';
                                            echo $output;
                                        endif;
                                    ?>
                                    <script>console.log(<?= json_encode($taxonomies); ?>);</script>
                                    <div class="entry-content">
                                        <?php the_excerpt(); ?>
                                        <a href="<?php the_permalink(); ?>">Read More</a>
                                    </div>
                                </article>
                                <?php
                            endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div><!-- Projects -->

        <div class="blog">
            <h2>Blog</h2>
            <div class="posts">
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'category__not_in' => get_cat_ID('Feature Projects'),
                        'posts_per_page' => 5,
                        'order' => 'ASC',
                    );
                    $arr_posts = new WP_Query( $args );
                    
                    if ( $arr_posts->have_posts() ) :
                    
                        while ( $arr_posts->have_posts() ) :
                            $arr_posts->the_post();
                            ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php
                                if ( has_post_thumbnail() ) :
                                    the_post_thumbnail();
                                endif;
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </header>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>">Read More</a>
                                </div>
                            </article>
                            <?php
                        endwhile;
                    endif;
                ?>
            </div>
        </div><!-- Blogs -->

    </div><! – .site-content – >

<?php get_footer(); ?>
