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

//db info
$server = "localhost";
$login = "root";   
$pass = "";
$database = "friends_db";

if(!($link=mysql_connect($server,$login,$pass)))
{
sprintf("internal error %d:%s\n", mysql_errno(),mysql_error());
}	

@mysql_select_db('friends_db',$link);

##########################
function checkValues($value)
{
//return $value;		
// Use this function on all those values where you want to check for both sql injection and cross site scripting
// Trim the value
$value = trim($value);
// Stripslashes
if (get_magic_quotes_gpc()) {
$value = stripslashes($value);
}
// Convert all &lt;, &gt; etc. to normal html and then strip these
$value = strtr($value,array_flip(get_html_translation_table(HTML_ENTITIES)));
// Strip HTML Tags
$value = strip_tags($value);

// Quote the value
$value = mysql_real_escape_string($value);
$value = htmlspecialchars ($value);
return $value;		
}	

function clickable_link($text = '')
{	
$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $text);
$ret = ' ' . $text;
$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"no_follow\">\\2</a>", $ret);

$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\">\\2</a>", $ret);
$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
$ret = substr($ret, 1);
return $ret;
}
?>