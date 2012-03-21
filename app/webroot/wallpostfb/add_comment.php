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

if(!@$user_id)
$user_id = $_REQUEST['x'];

$logged_in = 1;

if(checkValues($_REQUEST['comment_text']) && $_REQUEST['post_id'])
{

mysql_query("INSERT INTO facebook_posts_comments (post_id,comments,userid,date_created) VALUES('".$_REQUEST['post_id']."','".checkValues($_REQUEST['comment_text'])."','".$user_id."','".strtotime(date("Y-m-d H:i:s"))."')");


$result = mysql_query("SELECT t1.*,t2.*, 
UNIX_TIMESTAMP() - t1.date_created AS CommentTimeSpent FROM facebook_posts_comments as t1,member as t2 where t1.post_id = ".$_REQUEST['post_id']." AND t1.userid=t2.member_id order by t1.c_id desc limit 1");

}

while ($rows = mysql_fetch_array($result))
{
$days2 = floor($rows['CommentTimeSpent'] / (60 * 60 * 24));
$remainder = $rows['CommentTimeSpent'] % (60 * 60 * 24);
$hours = floor($remainder / (60 * 60));
$remainder = $remainder % (60 * 60);
$minutes = floor($remainder / 60);
$seconds = $remainder % 60;	

$member_avatar = getUserImg($user_id);
?>

<div class="commentPanel" id="record-<?php  echo $rows['c_id'];?>" align="left">

<a href="#">
<img src="<?php echo $member_avatar;?>" style="float:left; padding-right:9px;" width="40" height="40" border="0" alt="" />
</a>

<label class="name">
<b>
<a href="#">
<?php echo $rows['firstname'] . ' ' . $rows['lastname'];?>
</a>
</b>
<div class="name" style="text-align:justify;float:left;">
<em>
<?php  
$rows['comments'] =  ($rows['comments']);
echo clickable_link($rows['comments']);?>
</em>
</div>

<br clear="all" />

<div style="width:350px;float:right;">
<div style="float:left; padding-top:3px;">
<span class="timeanddate">
<?php
if($days2 > 0)
{
///$oldLocale = setlocale(LC_TIME, 'pt_BR');
$rows['date_created'] = strftime("%b %e %Y", $rows['date_created']); 
$rows['date_created'] = $rows['date_created'];
echo $rows['date_created'];
//setlocale(LC_TIME, $oldLocale);
}
elseif($days2 == 0 && $hours == 0 && $minutes == 0)
echo "few seconds ago";		
elseif($days2 == 0 && $hours == 0)
echo $minutes.' minutes ago';
else
echo "few seconds ago";	
?>
</span>
<?php
if($rows['userid'] == $user_id || $rows['userid'] == $user_id){?>
&nbsp;<a href="#" id="CID-<?php  echo $rows['c_id'];?>" class="c_delete">Delete</a>
<?php
}?> - 
<span id="clike-panel-<?php  echo $rows['c_id']?>">
<?php if (@$flag_already_liked_c == 0) {?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $user_id?>,<?php  echo $rows['c_id']?>,1,<?php  echo $rows['post_id']?>);">Like</a>
<?php }else {?>

<a href="javascript: void(0)" id="post_id<?php  echo $rows['c_id']?>" onclick="javascript: Clikethis(<?php echo $user_id?>,<?php  echo $rows['c_id']?>,2,<?php  echo $rows['post_id']?>);">Unlike</a>
<?php }?>
</span>
</div>
<div id="ppl_clike_div_<?php  echo $rows['c_id']?>" <?=(($rows['clikes']) ? 'float:left;padding-top:3px;' : 'style="display:none;float:left;padding-top:3px;"')?>>
- <a class="t" href="javascript:;" onclick="alert('Sorry this feature is not available in this demo version.')">
<span id="clike-stats-<?php  echo $rows['c_id']?>"> <?php echo $rows['clikes'];?> people like this</span>
</a>
</div>
</div>
<br clear="all" />
</label>
</div>
<?php
}?>	




