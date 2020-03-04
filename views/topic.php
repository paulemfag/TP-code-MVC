<?php
$title = 'Forum | Sujet';
//require_once '../controllers/sqltopic.php';
require_once 'require/header.php';
require_once '../controllers/sqltopic.php';
require_once 'require/footer.php';
?>
<script>
    $('response').trumbowyg({
        prefix: 'custom-prefix'
    });
</script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/topic.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/jquery/cookie/jquery.cookie.js"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/SCEditor/src/jquery.sceditor.js"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/SCEditor/src/plugins/bbcode.js"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/SCEditor/src/sceditor-commands.js"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/SCEditor/src/sceditor-commands-bbcode.js"></script>
<script type="text/javascript" src="https://illiweb.com/rs3/61/frm/SCEditor/src/sceditor-custom-bbcode.js"></script>
</body>
</html>