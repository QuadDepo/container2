
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Container 2 | Ryan George</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
    crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <style type="text/css">
        ul {
            padding: 10px 0px 10px 25px;
        }
        li {
            padding-top: 7px;
        }
        body {
            padding-top: 50px;
        }
        .folder{
            font-weight: bold;
            font-size: 1.2em;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        #masthead {
            min-height: 270px;
            background-color: #000044;
            color: #aaaacc;
        }
        #masthead h1 {
            font-size: 55px;
            line-height: 1;
        }
        #masthead .well {
            margin-top: 13%;
            background-color: #111155;
            border-color: #000033;
        }
        .icon-bar {
            background-color: #fff;
        }
        /* hide sidebar sub menus by default */

        #sidebar.nav .nav {
            display: none;
            font-size: 12px;
        }
        /* show sub menu when parent is active */

        #sidebar.nav>.active > ul {
            display: block;
        }
        #sidebar.nav>.active > ul > ul {
            display: block;
        }
        @media screen and (min-width: 768px) {
            #masthead h1 {
                font-size: 100px;
            }
        }
        .navbar-bright {
            background-color: #111155;
            color: #fff;
        }
        .navbar-bright a,
        #masthead a,
        #masthead .lead {
            color: #aaaacc;
        }
        .navbar-bright li > a:hover {
            background-color: #000033;
        }
        .affix-top,
        .affix {
            position: static;
        }
        @media (min-width: 979px) {
            #sidebar.affix-top {
                position: static;
                margin-top: 30px;
                width: 228px;
            }
            #sidebar.affix {
                position: fixed;
                top: 70px;
                width: 228px;
            }
        }
        .cd-top {
            display: inline-block;
            height: 40px;
            width: 40px;
            position: fixed;
            bottom: 40px;
            right: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            /* image replacement properties */

            overflow: hidden;
            text-indent: 100%;
            white-space: nowrap;
            background: rgba(232, 98, 86, 0.8) url(cd-top-arrow.svg) no-repeat center 50%;
            visibility: hidden;
            opacity: 0;
            -webkit-transition: opacity .3s 0s, visibility 0s .3s;
            -moz-transition: opacity .3s 0s, visibility 0s .3s;
            transition: opacity .3s 0s, visibility 0s .3s;
        }
        .cd-top.cd-is-visible,
        .cd-top.cd-fade-out,
        .no-touch .cd-top:hover {
            -webkit-transition: opacity .3s 0s, visibility 0s 0s;
            -moz-transition: opacity .3s 0s, visibility 0s 0s;
            transition: opacity .3s 0s, visibility 0s 0s;
        }
        .cd-top.cd-is-visible {
            /* the button becomes visible */

            visibility: visible;
            opacity: 1;
        }
        .cd-top.cd-fade-out {
            /* if the user keeps scrolling down, the button is out of focus and becomes less visible */

            opacity: .5;
        }
        .no-touch .cd-top:hover {
            background-color: #e86256;
            opacity: 1;
        }

    </style>



    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-danger">
                    Deze container is nog steeds onder constructie
                    <span class="pull-right"><a id="close_error">X</a>
                                                </span>
                </div>
                <h1>Container van Ryan George</h1>
                <h4>MV2D</h4>

            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <?php
$dir = scandir('files/');

foreach($dir as $site) {
    if (!(substr($site, 0, 1) === '.') && !(is_dir($site))) { ?>

                <?php
        if (count(glob("files/" . $site . "/*")) !== 0) { // empty
             ?>

                <h1 class="group" id="<?php
            echo $site;
?>"><?php
            echo $site;
?></h1>
                <?php
            listFolderFiles("files/" . $site); ?>

                <?php
        }
        else { ?>

                <?php
        }
    }
}

function listFolderFiles($dir)
{
    $ffs = scandir($dir);
    sort($ffs);
    echo '<ul>';
    foreach($ffs as $ff) {
        if (!(substr($ff, 0, 1) === '.')) {
            if (is_dir($dir . '/' . $ff)) {
                $files = glob($dir . "/" . $ff . "/*.html");
                $php = glob($dir . "/" . $ff . "/*.php");
                if ($files || $php) {
                    echo '<li class="item" id=" '. strtolower(str_replace(' ', '', $ff)) .' "><a target="_blank" href="' . $dir . '/' . $ff . '">' . $ff . '</a></li>';
                }
                else {
                    if (count(glob($dir . "/" . $ff . "/*")) !== 0) {
                        $ffID = str_replace(' ', '', $ff);
                        $ffID = str_replace('-', '', $ffID);
                        echo "<li class='item folder' id=" . $ffID . ">" . $ff . "</li>";
                        listFolderFiles($dir . '/' . $ff);
                    }
                    else {
                    }
                }
            }
            else {
                if ($ff == "links.txt") {
                    linksFile($dir . '/' . $ff);
                }
                else {
                    $ff_name = $ff;
                    $ff_name = substr($ff_name, 0, strrpos($ff_name, "."));
                    $ff_name = str_replace('_', ' ', $ff_name);
                    $ff_id = str_replace(' ', '', $ff_name);
                    $ff_id = str_replace('-', '', $ff_id);
                    $ff_id = preg_replace('/[0-9]+/', '', $ff_id);
                    echo '<li class="item" id="' . $ff_id . '"><a target="_blank" href="' . $dir . '/' . $ff . '">' . $ff_name . "</a></li>";
                }
            }
        }
    }

    echo '</ul>';
}

function linksFile($links)
{
    $handle = fopen($links, "r");
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            if (!($line == "\n")) { // code...
             $lineLink=substr($line, 0, strpos($line, "*"));
              $lineName=substr($line, strpos($line, '*') + strlen('*'));
                echo '<li><a target="_blank" href="' . $lineLink . '">' . $lineName . '</a></li>';
            }
        }

        fclose($handle);
    }
    else { // error opening the file. } }

       }

       } ?>

            </div>
        </div>
    </div>



    <a href="#0" class="cd-top">Top</a>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
    crossorigin="anonymous"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script type="text/javascript">
        $('#close_error')
            .click(function () {
                $('.alert')
                    .fadeOut(300);
            });
        jQuery(document)
            .ready(function ($) {

                // browser window scroll (in pixels) after which the "back to top" link is shown

                var offset = 300,

                    // browser window scroll (in pixels) after which the "back to top" link opacity is reduced

                    offset_opacity = 1200,

                    // duration of the top scrolling animation (in ms)

                    scroll_top_duration =
                    700,

                    // grab the "back to top" link

                    $back_to_top = $(
                        '.cd-top');


                // hide or show the "back to top" link

                $(window)
                    .scroll(function () {
                        ($(
                                this
                            )
                            .scrollTop() >
                            offset
                        ) ?
                        $back_to_top
                            .addClass(
                                'cd-is-visible'
                            ):
                            $back_to_top
                            .removeClass(
                                'cd-is-visible cd-fade-out'
                            );
                        if ($(
                                this
                            )
                            .scrollTop() >
                            offset_opacity
                        ) {
                            $back_to_top
                                .addClass(
                                    'cd-fade-out'
                                );
                        }
                    });


                // smooth scroll to top

                $back_to_top.on('click',
                    function (
                        event
                    ) {
                        event
                            .preventDefault();
                        $(
                                'body,html'
                            )
                            .animate({
                                    scrollTop: 0,
                                },
                                scroll_top_duration
                            );
                    });

            });


        $('body')
            .scrollspy({
                target: '#leftCol',
                offset: 60
            });

    </script>
</body>

</html>
