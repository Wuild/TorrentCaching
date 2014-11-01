<?php
$page = new Page(PAGE_URL, PAGE_ACTION);
$content = $page->Build();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo _configs()->website->name ?></title>
    <base href="<?php echo _configs()->website->url; ?>">
    <link href="template/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <script src="template/js/jquery-1.11.1.min.js"></script>
    <script src="template/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="header">
        <h3>TorrentCaching
            <small>Lightweight and easy to use</small>
        </h3>
    </div>
</div>
<div class="container">
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="navbar-nav nav">
                <li><a href="<?php echo _configs()->website->url ?>">Start</a></li>
                <li><a href="<?php echo Page::Url("upload") ?>">Upload</a></li>
                <li><a href="<?php echo Page::Url("docs") ?>">Documentation</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="content">
        <?php echo $content; ?>
    </div>
</div>
<div class="container">
    <div class="footer navbar navbar-default">
        <div class="navbar-text pull-left">
            Powered by TorrentCaching
        </div>
        <div class="navbar-text navbar-right" style="margin-right: 15px;">
            v<?php echo _configs()->system->version; ?> @ Wuild
        </div>
    </div>
</div>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-56314980-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>