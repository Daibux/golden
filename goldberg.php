<?php
	require 'vendor/autoload.php';
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Writer\PngWriter;
	$image_code = '';

	if(isset($_POST['create'])){
		if($_POST['content'] !== ''){
			$temporary_directory = 'temp/';
			$file_name = md5(uniqid()) . '.png';
			$file_path = $temporary_directory . $file_name;

			$qr_Code = new QrCode(trim($_POST['content']));
			

			$writer = new PngWriter();
			$result = $writer->write($qr_Code);

			$result->saveToFile($file_path);
			$image_code = '<div class="text-center"><img src="'.$file_path.'" /></div>';
		}
	}

	?>
    <form method="post">
    <div class="mb-3">
        <label>Enter Content</label>
        <input type="text" name="content" class="form-control" />
    </div>
    <div class="mb-3">
        <input type="submit" name="create" class="btn btn-primary" value="Generate" />
    </div>
    <?php echo $image_code; ?>
</form>
