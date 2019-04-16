<html>
<head>
<title>Demo</title>
<link rel="stylesheet" href="css/ex.css" type="text/css">
<link rel="stylesheet" href="css/ex2.css" type="text/css">

<script src="js/dw_tooltip_c.js" type="text/javascript"></script>
<script type="text/javascript">

dw_Tooltip.defaultProps = {
    //supportTouch: true, // set false by default
    wrapFn: dw_Tooltip.wrapTextByImage
}
// See info on image-text functions at http://www.dyn-web.com/code/tooltips/documentation2.php#img_txt
// Problems, errors? See http://www.dyn-web.com/tutorials/obj_lit.php#syntax

dw_Tooltip.content_vars = {
    L1: {
        img: 'images/Capture.JPG',
        //txt: 'Heron image created from a character font.',
        //w: 210 // width of tooltip
    },
    L2: {
        img: 'images/wader.gif',
        txt: 'Another image created from a character font',
        w: 210
    },
    L3: {
        caption: 'Heron', // optional caption 
        img: 'images/heron.gif',
        txt: 'Heron image created from a character font.',
        w: 210
    }
}

</script>
</head>
<body>

<h1>Images and Text Side by Side in the Tooltip</h1>

<ul>
    <label>user name</label><input type="text" class="showTip L1" name=""></a></li>
    <li><a href="#" class="showTip L2">Link 2</a></li>
    <li><a href="#" class="showTip L3">Link 3</a>, with optional caption</li>
</ul>

<p>See online <a href="http://www.dyn-web.com/code/tooltips/documentation2.php#img_txt">documentation</a> and <a href="http://www.dyn-web.com/code/tooltips/image_text.php">demo's</a> for more ways to display images and text in the tooltip.</p>

<p>Back to <a href="index.html">index</a> for more demo's and information.</p>

</body>
</html>
