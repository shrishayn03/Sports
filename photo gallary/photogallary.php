<?php
// error_reporting (E_ALL ^ E_NOTICE);
// gallery settings
$itemsPerPage = '16';         // number of images per page    
$thumb_width  = '120';        // width of thumbnails
$thumb_height = '85';         // height of thumbnails
$src_folder   = '.';             // current folder
$src_files    = scandir($src_folder); // files in current folder
$extensions   = array(".jpg",".png",".gif",".JPG",".PNG",".GIF"); // allowed extensions in photo gallery

// create thumbnails from images
function make_thumb($folder,$src,$dest,$thumb_width) {

	$source_image = imagecreatefromjpeg($folder.'/'.$src);
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	$thumb_height = floor($height*($thumb_width/$width));
	
	$virtual_image = imagecreatetruecolor($thumb_width,$thumb_height);
	
	imagecopyresampled($virtual_image,$source_image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
	
	imagejpeg($virtual_image,$dest,100);
	
}

// display pagination
function print_pagination($numPages,$currentPage) {
     
   echo 'Page '. $currentPage .' of '. $numPages;
   
   if ($numPages > 1) {
      
	   echo '&nbsp;&nbsp;';
   
       if ($currentPage > 1) {
	       $prevPage = $currentPage - 1;
	       echo '<a href="'. $_SERVER['PHP_SELF'] .'?p='. $prevPage.'">&laquo;&laquo;</a>';
	   }	   
	   
	   for( $e=0; $e < $numPages; $e++ ) {
           $p = $e + 1;
       
	       if ($p == $currentPage) {	    
		       $class = 'current-paginate';
	       } else {
	           $class = 'paginate';
	       } 
	       

		       echo '<a class="'. $class .'" href="'. $_SERVER['PHP_SELF'] .'?p='. $p .'">'. $p .'</a>';
		  	  
	   }
	   
	   if ($currentPage != $numPages) {
           $nextPage = $currentPage + 1;	
		   echo '<a href="'. $_SERVER['PHP_SELF'] .'?p='. $nextPage.'">&raquo;&raquo;</a>';
	   }	  	 
   
   }

}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Gallery</title>
<link rel="stylesheet" type="text/css" href="photo.css" />
</head>
<body>

<div align="center" style="font-size:13px;font-weight:bold;">
<div><?php include("includes/topbar.php"); ?></div>

<div><?php include("includes/header.php"); ?></div>

<div><?php include("includes/navbar.php"); ?></div>



<div class="gallery">  
<?php 
$files = array();
foreach($src_files as $file) {
        
	$ext = strrchr($file, '.');
    if(in_array($ext, $extensions)) {
          
       array_push( $files, $file );
		  
		   
       if (!is_dir($src_folder.'/thumbs')) {
          mkdir($src_folder.'/thumbs');
          chmod($src_folder.'/thumbs', 0777);
          //chown($src_folder.'/thumbs', 'apache'); 
       }
		   
	   $thumb = $src_folder.'/thumbs/'.$file;
       if (!file_exists($thumb)) {
          make_thumb($src_folder,$file,$thumb,$thumb_width); 
          
	   }
        
	}
      
}
 

if ( count($files) == 0 ) {

    echo 'There are no photos in this album!';
   
} else {
   
    $numPages = ceil( count($files) / $itemsPerPage );

    if(isset($_GET['p'])) {
      
       $currentPage = $_GET['p'];
       if($currentPage > $numPages) {
           $currentPage = $numPages;
       }

    } else {
       $currentPage=1;
    } 

    $start = ( $currentPage * $itemsPerPage ) - $itemsPerPage;

    for( $i=$start; $i<$start + $itemsPerPage; $i++ ) {
		  
	   if( isset($files[$i]) && is_file( $src_folder .'/'. $files[$i] ) ) { 
	   
	      echo '<div class="thumb">
	            <a href="'. $src_folder .'/'. $files[$i] .'" class="albumpix" rel="albumpix">
			       <img src="'. $src_folder .'/thumbs/'. $files[$i] .'" width="'.$thumb_width.'" height="'.$thumb_height.'" alt="" />
				</a>  
			    </div>'; 
      
	    } else {
		  
		  if( isset($files[$i]) ) {
		    echo $files[$i];
		  }
		  
		}
     
    }
	   

     echo '<div class="clear"></div>';
  
     echo '<div class="p5-sides">
	         <div class="float-left">'.count($files).' images</div>
	 
	         <div class="float-right" class="paginate-wrapper">';
        	 
              print_pagination($numPages,$currentPage);
  
       echo '</div>
	 
	         <div class="clearb10">
		   </div>';

}
?>
  
</div>   

<div><?php include("includes/foot.php"); ?></div></div>
</body>
</html>