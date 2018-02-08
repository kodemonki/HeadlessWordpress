<html>

<head>
    <title>Website</title>
</head>

<body>
    <h1>Welcome to my Website</h1>
    <ul>
        <?php
            $url = 'http://wordpress/wp-json/wp/v2/';
            $json = file_get_contents($url);
            $obj = json_decode($json);
            var_dump($obj);            
            ?>
    </ul>
</body>

</html>
