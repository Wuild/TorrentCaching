<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <base href="<?php echo URL; ?>" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>TorrentCaching</title>
        <meta name="description" content="Upload and cache torrent files." />
        <meta name="keywords" content="torrent, cache, tfc" />
        <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="template/bootstrap/css/bootstrap-responsive.min.css" type="text/css" />
        <link rel="stylesheet" href="template/bootstrap/css/docs.css" type="text/css" />
        <script src="template/bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="template/bootstrap/js/bootstrap.min.js"></script>


    </head>
    <body>
        <div id="wrap">
            <div class="container-narrow">

                <div class="masthead">
                    <ul class="nav nav-pills pull-right">
                        <li <?php echo (CURRENT_MODULE == "start" ? "class='active'" : "") ?>><a href="/">Home</a></li>
                        <li <?php echo (CURRENT_MODULE == "upload" ? "class='active'" : "") ?>><a href="/upload">Upload torrent</a></li>
                        <li <?php echo (CURRENT_MODULE == "documentation" ? "class='active'" : "") ?>><a href="/documentation">API Documentation</a></li>
                        <li><a href="https://github.com/Wuild/TorrentCaching/" target="_blank">GitHub</a></li>
                    </ul>
                    <h3 class="muted"><a href="/">TorrentCaching</a></h3>
                </div>

                <hr>

                    <?php echo $this->main_content; ?>

                    <hr />

                    <div class="footer">
                        <span style="float:left;">
                            <iframe  src="//www.facebook.com/plugins/like.php?href=https://www.facebook.com/torrent.file.caching&amp;send=false&amp;layout=standard&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35&amp;appId=153023661400950" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:35px;"></iframe>
                        </span>
                        <span style="float:right;">Powered by <a href="http://torrentcaching.com">TorrentCaching</a></span>
                    </div>

            </div>
        </div>
    </body>
</html>

