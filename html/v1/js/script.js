/*jslint devel: true, browser: true, unparam: true, debug: false, es5: true, white: true, maxerr: 50, indent: 4 */

//console.log('script.js loaded');

function getSamplePage() {
    "use strict";
    const pagesContainer = document.getElementById('pages-list')
    fetch('http://localhost:8000/?rest_route=/wp/v2/pages/2&lang=fr')
        .then(r => r.json())
        .then(page => {
            const pageDiv = document.createElement('div');
            pageDiv.innerHTML = '<h1>' + page.title.rendered + '</h1><p>' + page.content.rendered + '</p>';
            pagesContainer.appendChild(pageDiv);
        })
}
