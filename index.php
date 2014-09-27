<html lang="de">

<head>
    <title>Bootstrap Image Gallery</title>
    <!-- used to start like an app with google chrome on android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Bootstrap Layout // loading default Stylesheet in 'js/main.js' -->
    <link id="pagestyle" rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

    <!-- Own Stylesheets  Layout -->
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <!-- Gallery Layout -->
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css" />
    <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css" />

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>

</head>

<body>
    <!-- // content start -->
    <div class="container-fluid">
        <div id="subfolderPlaceholder"></div>
        <span class="help-block"></span>
        <div class="row" id="imageThumbnails"></div>
    </div>

    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>  <a class="next">›</a>  <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator">
        </ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i> Previous
                        </button>
                        <button type="button" class="btn btn-default play-pause" id="StartSlideshow">Slideshow
                            <i class="glyphicon glyphicon-play-circle"></i>
                        </button>
                        <button type="button" class="btn btn-primary next">Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of the modal dialog -->
    </div>
    </div>
    <!-- // content end -->

    <!-- End of Bootstrap Image Gallery lightbox -->
    <!-- Start: Blueimp Gallery Scripts -->
    <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="js/bootstrap-image-gallery.min.js"></script>
    <!-- End: Blueimp Gallery Scripts -->

    <script src="js/readFiles.js"></script>

    <!-- Begin read files from folder -->
    <script>
        $(document).ready(function () {
            var rootfolder = '../gallery';
            getImageData(rootfolder);
        });
    </script>
    <!-- End read files from folder -->

     <script>
        $('#home_btn').click(function () {
            $('#StartSlideshow').toggleClass('active');
        });
    </script>

</body>

</html>
