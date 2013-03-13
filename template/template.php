<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <base href="<?php echo URL; ?>" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>TFC</title>
        <meta name="description" content="Upload and cache torrent files." />
        <meta name="keywords" content="torrent, cache, tfc" />
        <link rel="stylesheet" href="template/bootstrap/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="template/bootstrap/css/bootstrap-responsive.min.css" type="text/css" />
        <style type="text/css">
            body {
                padding-top: 20px;
                padding-bottom: 40px;
            }

            /* Wrapper for page content to push down footer */
            #wrap {
                min-height: 100%;
                height: auto !important;
                height: 100%;
                /* Negative indent footer by it's height */
                margin: 0 auto -60px;
            }

            /* Custom container */
            .container-narrow {
                margin: 0 auto;
                max-width: 700px;
            }
            .container-narrow > hr {
                margin: 30px 0;
            }

            /* Main marketing message and sign up button */
            .jumbotron {
                margin: 60px 0;
                text-align: center;
            }
            .jumbotron h1 {
                font-size: 72px;
                line-height: 1;
            }
            .jumbotron .btn {
                font-size: 21px;
                padding: 14px 24px;
            }

            /* Supporting marketing content */
            .marketing {
                margin: 60px 0;
            }
            .marketing p + h4 {
                margin-top: 28px;
            }

        </style>
    </head>
    <body>
        <div id="wrap">
            <div class="container-narrow">

                <div class="masthead">
                    <ul class="nav nav-pills pull-right">
                        <li <?php echo (CURRENT_MODULE == "start" ? "class='active'" : "") ?>><a href="/">Home</a></li>
                        <li <?php echo (CURRENT_MODULE == "upload" ? "class='active'" : "") ?>><a href="/upload">Upload torrent</a></li>
                        <li <?php echo (CURRENT_MODULE == "api" ? "class='active'" : "") ?>><a href="/api">API</a></li>
                    </ul>
                    <h3 class="muted"><a href="/">Torrent Caching</a></h3>
                </div>

                <hr>

                    <?php echo $this->main_content; ?>

                    <hr />

                    <div class="footer">
                        <p>This product is created by Wuild and is opensource</p>
                    </div>

            </div>
        </div>
        <script src="template/bootstrap/js/jquery-1.9.1.min.js"></script>
        <script src="template/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>

