<?php
/* Wall+ script by 99Points.info 
 * Copyright (c) 2011 Zeeshan Rasool
 * Licensed under the GNU General Public License version 3.0 (GPLv3)
 * http://www.webintersect.com/license.php
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 * See the GNU General Public License for more details.

 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Date: January 1, 2012
 *------------------------------------------------------------------------------------------------*/

include('newCon.php');

$path = "media/";

$valid_formats_img = array("jpg", "jpeg", "gif");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_FILES['current_image']['name'];
$size = $_FILES['current_image']['size'];

if(strlen($name))
{
list($txt, $ext) = explode(".", $name);

if(in_array($ext, $valid_formats_img))
{
if($size<(1024*1024))
{
$actual_image_name = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
$tmp = $_FILES['current_image']['tmp_name'];

if(move_uploaded_file($tmp, $path.$actual_image_name))
{
	echo "<input type='hidden' id='ajax_image_url' value='".$actual_image_name."'>";
	echo "<img src='media/".$actual_image_name."'  class='showthumb' width='150'>";
}
else
	echo "Please try again.";
}
else
echo "Sorry, maximum file size should be 1MB";					
}
else
echo "Invalid format, try again";	
}
else
echo "Please select an image.";

exit;
}
?>