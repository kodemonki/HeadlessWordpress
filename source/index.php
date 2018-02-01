<<<<<<< HEAD
<?php
    $baseurl = 'php/';
    include $baseurl.'functions.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>WP Headless CMS</title>
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/styles.css">
    </head>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WP Headless CMS</title>
</head>
>>>>>>> parent of f834724... added sass glob

<body>
    <!-- the element which will hold the pages list -->

    <h2>Php</h2>
    <div id="pages-list-php">
        <?php
        
        $dataObj = Url2Obj('http://localhost:80/wp-json/wp/v2/pages/2/');
        
<<<<<<< HEAD

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <!-- Tether -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <!-- Bootstrap 4 -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <!-- fetch polyfill -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>
        <!-- project json -->
        <script src="/js/script.js"></script>

        <script type="text/javascript">
            getSamplePage();
        </script>

    </body>

    </html>

=======
>>>>>>> parent of f834724... added sass glob
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

    </script>
</body>

</html>
<<<<<<< HEAD

=======
>>>>>>> parent of f834724... added sass glob
