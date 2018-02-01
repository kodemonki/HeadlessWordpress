<?php $baseurl = './php/'; ?>
<?php include $baseurl.'common.php'; ?>
<?php include $baseurl.'head.php'; ?>
<?php include $baseurl.'header.php'; ?>
<?php include $baseurl.'navigation.php'; ?>

<!-- StartOfContent -->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div id="pages-list-php">
                <?php
                $dataObj = Url2Obj($WpEndpoint.'/pages/4');        
                echo '<h1>'.($dataObj['title']['rendered']).'</h1><p>'.($dataObj['content']['rendered']).'</p>';
            ?>
            </div>
        </div>
    </div>
</div>

<!-- EndOfContent -->

<?php include $baseurl.'footer.php'; ?>
<?php include $baseurl.'js.php'; ?>

<!-- StartOfContentJavascript -->
<script type="text/javascript">


</script>

<!-- EndOfContentJavascript -->

<?php include $baseurl.'foot.php'; ?>
