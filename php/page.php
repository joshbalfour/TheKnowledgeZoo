<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include("../php/pagetitle.php")?></title>
<link rel="stylesheet" type="text/css" href="<?php echo "../templates/$template/$template.css";?>" />
</head>
<body>

<?php include("../templates/$template/pretitle.php") ?>
<?php include("../php/title.php")?>
<?php include("../templates/$template/posttitle.php") ?>

<?php include("../templates/$template/prenav.php") ?>
<?php include("../php/pagenav.php")?>
<?php include("../templates/$template/postnav.php") ?>

<?php include("../templates/$template/precontent.php") ?>
<?php include("../php/pagecontent.php")?>
<?php include("../templates/$template/postcontent.php") ?>

<?php include("../templates/$template/prefooter.php") ?>
<?php include("../php/footer.php")?>
<?php include("../templates/$template/postfooter.php") ?>

</body>
</html>