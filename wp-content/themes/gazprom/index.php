<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>

<<<<<<< HEAD
<body>
    <!-- the element which will hold the pages list -->

    <h2>Php</h2>
    <div id="pages-list-php">
        <?php
        
        $dataObj = Url2Obj('http://localhost:80/wp-json/wp/v2/pages/2/');
        
        echo '<h1>'.($dataObj['title']['rendered']).'</h1><p>'.($dataObj['content']['rendered']).'</p>';   
                        
        ?>

    </div>
    <h2>Javascript</h2>
    <div id="pages-list"></div>
    <!-- load the polyfill -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

    <script type="text/javascript">
        const pagesContainer = document.getElementById('pages-list')
        fetch('http://localhost:8000/wp-json/wp/v2/pages/2/')
            .then(r => r.json())
            .then(page => {
                const pageDiv = document.createElement('div');
                pageDiv.innerHTML = '<h1>' + page.title.rendered + '</h1><p>' + page.content.rendered + '</p>';
                pagesContainer.appendChild(pageDiv);
            })
=======
<body <?php body_class(); ?>>

<div class="wrap">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <?php
      if (have_posts()) :
        /* Start the Loop */
        while (have_posts()) : the_post();
      ?>
        <div>
          <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        </div>
      <?php
        endwhile;
        /* End the Loop */
      else :
        // Nothing
      endif;
      ?>
>>>>>>> parent of 4d4cad6... plugins

    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer(); ?>
<?php wp_footer(); ?>

</body>
</html>