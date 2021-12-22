<?php
/*
Template Name: Home Page
Template Post Type: page
*/

get_header(); ?>
	<body>
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

            </div><!-- hero -->

		</div><! – .site-content – >
		

		<?php wp_footer(); ?>
	</body>

</html>