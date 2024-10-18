<?php session_start(); ?>
<?php include('bb_include/header.php'); ?>
</head>

<body id="single" >
<div class="conteneur">
    
    <?php include('bb_include/head.php'); ?>
    
    <main>

        
                 <?php $categories = get_the_category(); 
                        foreach( $categories as $category ) {
                            echo $category->name;
                        }
                 ?>        
        
        
        
        <?php while(have_posts()): the_post(); ?>
            <article>

                <h1 class=""><?php the_title() ?></h1>
                
      
                <?php if ( has_post_thumbnail() ) {
                  
                        $imageData = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' );
                         // attribut src de l'image à la une
                        echo '<img src="'.$imageData[0].'" class=""/>';
                            
                } ?>
                        
                <?php the_content(); ?>
                       

            </article>
        <?php endwhile;?> 
        
</main>
    
<?php include('bb_include/footer.php') ?>  
<?php wp_reset_query(); ?>
<?php wp_footer(); ?>
</div>
</body>
</html>