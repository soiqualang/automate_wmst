<?php
if(isset($_REQUEST['btn_intro'])){
	$intro=$_REQUEST['intro'];
	$myfile = fopen("intro.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $intro);
	fclose($myfile);
}
$myfile = fopen("intro.txt", "r") or die("Unable to open file!");
$intro=fread($myfile,filesize("intro.txt"));
fclose($myfile);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Automate LST & NDVI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Nội dung lời chào</h2>
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Intro:</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="intro" placeholder="Nội dung lời chào" name="intro" rows="10"><?php echo $intro;?></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="btn_intro" id="btn_intro" class="btn btn-default">--Lưu--</button>
      </div>
    </div>
  </form>
  <hr>
  <a href="../" target="_blank">Xem bản đồ</a>
</div>

</body>
</html>
