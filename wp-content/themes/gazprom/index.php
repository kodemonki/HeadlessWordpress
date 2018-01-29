<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>WP Headless CMS</title>
</head>

<body>
    <!-- the element which will hold the pages list -->
    <div id="pages-list"></div>

    <!-- load the polyfill -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.min.js" charset="utf-8"></script>

    <script type="text/javascript">
        const pagesContainer = document.getElementById('pages-list')
        // fetch all pages
        // here I'm using port 8888 on localhost, but your URL might of course be different
        fetch('http://localhost:8000/wp-json/wp/v2/pages/')
            // get the response as JSON
            .then(r => r.json())
            // go through the pages and append each pages' title to the HTML element
            .then(pages => {
                pages.map(page => {
                    const pageDiv = document.createElement('div')
                    pageDiv.innerHTML = '<h1>' + page.title.rendered + '</h1><p>' + page.content.rendered + '</p>';
                    pagesContainer.appendChild(pageDiv)
                })
            })

    </script>
</body>

</html>
