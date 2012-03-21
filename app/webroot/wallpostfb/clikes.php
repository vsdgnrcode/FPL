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
include('wall-functions.php');

$member_id = isset($_REQUEST['member_id']) && is_numeric($_REQUEST['member_id']) ? intval($_REQUEST['member_id']) : '';
$entry_id = isset($_REQUEST['post_id']) && is_numeric($_REQUEST['post_id']) ? intval($_REQUEST['post_id']) : '';

$likes = 0;
if(@$_REQUEST['action'] == 1)
{
$result = mysql_query("update facebook_posts_comments set clikes=clikes+1 where c_id= ".$entry_id);
$result = mysql_query("INSERT INTO facebook_likes_track (comment_id,member_id) VALUES('".$entry_id."','".$member_id."')");
$result = mysql_query("SELECT clikes FROM facebook_posts_comments where c_id = ".$entry_id." ");

if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['clikes'];
}
}

echo $likes;
}
else if(@$_REQUEST['action'] == 2)
{
$result = mysql_query("update facebook_posts_comments set clikes=clikes-1 where c_id= ".$entry_id);
$result = mysql_query("delete from facebook_likes_track where comment_id=".$entry_id." and member_id=".$member_id);
$result = mysql_query("SELECT clikes FROM facebook_posts_comments where c_id = ".$entry_id." ");

if (mysql_num_rows($result) > 0)
{
while( $obj = @mysql_fetch_array($result) )
{
$likes 	= $obj['clikes'];
}
}

echo $likes;
}


?>