<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WP Headless CMS</title>
</head>

<body>
    <!-- the element which will hold the pages list -->

    <h2>Php</h2>
    <div id="pages-list-php">
        <?php 
        
        $url="http://localhost:80/wp-json/wp/v2/pages/2/";
        //  Initiate curl        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result = curl_exec($ch);
        // Will dump a beauty json :3
        $page = (json_decode($result, true));        
        
        echo '<h1>'.($page['title']['rendered']).'</h1>';
        echo '<p>'.($page['content']['rendered']).'</p>';   
        
        // Closing
        curl_close($ch);
        ?>

    </div>
    <h2>Javascript</h2>
    <div id="pages-list"></div>
    <!-- load the polyfill -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

    <script type="text/javascript">
        const pagesContainer = document.getElementById('pages-list')
        // fetch all pages
        fetch('http://localhost:8000/wp-json/wp/v2/pages/2/')
            // get the response as JSON
            .then(r => r.json())
            // go through the pages and append each pages' title to the HTML element
            .then(page => {
                const pageDiv = document.createElement('div');
                pageDiv.innerHTML = '<h1>' + page.title.rendered + '</h1><p>' + page.content.rendered + '</p>';
                pagesContainer.appendChild(pageDiv);
            })

    </script>
</body>

</html>
