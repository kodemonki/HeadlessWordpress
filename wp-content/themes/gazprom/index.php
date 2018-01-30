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

    </script>
</body>

</html>
