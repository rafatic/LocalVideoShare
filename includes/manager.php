<?php 
	/// TODO : comment
	function getMovies()
	{
		foreach (new DirectoryIterator('D:\\partageColoc\\movies') as $file) {
		    if($file->isDot()) continue;

		    $fileInfo[] = [
		        $file->getFilename(),
		        formatBytes($file->getSize())
		    ];

		}
		return $fileInfo;

	}

	function getSeries()
	{
		foreach (new DirectoryIterator('D:\\partageColoc\\series') as $file) {
		    if($file->isDot()) continue;

		    $fileInfo[] = [
		        $file->getFilename(),
		        formatBytes($file->getSize())
		    ];

		}

		return $fileInfo;
	}

	function formatBytes($size, $precision = 2)
	{
	    $base = log($size, 1024);
	    $suffixes = array('', 'K', 'M', 'G', 'T');   

	    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	}

	function uploadFile($fileToUpload, $type)
	{
		$targetDir = "D:\\partageColoc\\";
		if($type == "movie")
		{
			$targetDir .= "movies\\";
		}
		else
		{
			$targetDir .= "series\\";
		}
		$targetFile = $targetDir . basename($fileToUpload["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		
		// Check if file already exists
		if (file_exists($targetFile)) 
		{
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "avi") 
		{
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else 
		{
		    if (move_uploaded_file($fileToUpload["tmp_name"], $targetFile)) 
		    {
		        echo "The file \"". basename( $fileToUpload["name"]). "\" has been uploaded.";
		    } else 
		    {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}


?>