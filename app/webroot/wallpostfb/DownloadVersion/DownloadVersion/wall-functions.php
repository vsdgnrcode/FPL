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

// change this to your path
$path = 'http://localhost/99points/wall/';

if(!function_exists('getUserImg')) {

		function getUserImg($user_id = ''){
		
			$username_get = mysql_query("SELECT picture,gender from member where member_id=".$user_id." order by member_id desc limit 1");
			while ($name = @mysql_fetch_array($username_get))
			{
				$picture = $name['picture'];
				$gender = $name['gender'];
			}
			
			$imageUser = 'pics/'.$picture;
		
			if (!file_exists($imageUser) || $picture=='')  
			{
				if($gender == 'm')
				$imageUser = 'pics/no-image-m.png';
				else
				$imageUser = 'pics/no-image-f.png';
			}
			
			return  $imageUser;
		}
	}
	?>