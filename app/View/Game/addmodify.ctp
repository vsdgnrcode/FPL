<div align="center"><center>

<table cellSpacing="1" bgcolor="#008000" cellpadding="4" width="1100">
  <tr align="center">
    <th align="center" bgcolor="#94CE94"><strong>Details of jobs</strong></th>
  </tr>
  <tr>
    <th align="center" bgcolor="#FFFFFF" width="90%"><form action="addmodify"
    method="POST" NAME="I_F" align="center">
      <input type="hidden" name="id" value="0"><input type="hidden" name="time_last_fired"
      value="0"><div align="center"><center><table class="cborder" cellSpacing="4"
      cellPadding="2">
<TBODY>
        <tr bgColor="#ffffff" align="center">
          <td vAlign="top" align="right"><b>Script to run:</b></td>
          <td align="left" colspan="2"><input class="box" size="100"
          value="" name="scriptpath"><font size="2"><strong> <a href="javascript:testpath();">test path^</a></strong></font><br>
          enter the path to the script you wish to run<script language="JavaScript"><!--
function testpath()
{
 if (confirm("If you have entered the path to the script correctly the script will be executed NOW.\n\nDo you wish to continue?")) 
 {
  var tWindow = null;
  if(tWindow != null) if(!tWindow.closed) tWindow.close()
  tWindow=open(document.I_F.scriptpath.value,'tWin'); 
 }
}
// --></script>
          <strong>- <a href="http://www.dwalker.co.uk/forum/viewtopic.php?p=2759" target="_blank">help
          and more detail here^</a></strong></font></td>
        </tr>
        <tr bgColor="#ffffff" align="center">
          <td vAlign="top" align="right"><b>Job name:</b></td>
          <td align="left" colspan="2"><input class="box" size="29" name="name"
          value="Email site stats to boss"><br>
          The name will be used to refer to this new job<br />
          <br /></td>
        </tr>
        <tr bgColor="#ffffff" align="center">
          <td vAlign="top" align="right" rowspan="4"><b><br>
          <br>
          Run this script:</b></td>
          <td align="left" bgcolor="#E9E9E9"><div align="right"><strong><font color="#000000">MINUTES</font></strong></td>
          <td align="left" bgcolor="#E9E9E9">- run every: 
            <select class="button" name="minutes"
          onchange="disable_others()" size="1" value="0" >
            <option selected value="-1">0</option>
            <option value="1">1 </option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="4">4 </option>
            <option value="5">5 </option>
            <option value="6">6 </option>
            <option value="7">7 </option>
            <option value="8">8 </option>
            <option value="9">9 </option>
            <option value="10">10 </option>
            <option value="11">11 </option>
            <option value="12">12 </option>
            <option value="13">13 </option>
            <option value="14">14 </option>
            <option value="15">15 </option>
            <option value="16">16 </option>
            <option value="17">17 </option>
            <option value="18">18 </option>
            <option value="19">19 </option>
            <option value="20">20 </option>
            <option value="21">21 </option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30 </option>
            <option value="31">31 </option>
            <option value="32">32 </option>
            <option value="33">33 </option>
            <option value="34">34 </option>
            <option value="35">35 </option>
            <option value="36">36 </option>
            <option value="37">37 </option>
            <option value="38">38 </option>
            <option value="39">39 </option>
            <option value="40">40 </option>
            <option value="41">41 </option>
            <option value="42">42 </option>
            <option value="43">43 </option>
            <option value="44">44 </option>
            <option value="45">45 </option>
            <option value="46">46 </option>
            <option value="47">47 </option>
            <option value="48">48 </option>
            <option value="49">49 </option>
            <option value="50">50 </option>
            <option value="51">51</option>
            <option value="52">52</option>
            <option value="53">53 </option>
            <option value="54">54 </option>
            <option value="55">55 </option>
            <option value="56">56 </option>
            <option value="57">57 </option>
            <option value="58">58 </option>
            <option value="59">59 </option>
          </select> minute(s)&nbsp; you MUST update the time frame window to use minutes see <a
          href="../readme.html#timeframewindow">readme file</a></td>
        </tr>
        <tr>
          <td align="left" bgcolor="#E9E9E9"><div align="right"><font color="#FF0000"><strong>HOURLY</strong></font></td>
          <td align="left" bgcolor="#E9E9E9">- run every: 
            <select class="button" name="hours"
          onchange="disable_others()" size="1" value="0" >
            <option selected value="-1">0</option>
            <option value="1">1 </option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="4">4 </option>
            <option value="5">5 </option>
            <option value="6">6 </option>
            <option value="7">7 </option>
            <option value="8">8 </option>
            <option value="9">9 </option>
            <option value="10">10 </option>
            <option value="11">11 </option>
            <option value="12">12 </option>
            <option value="13">13 </option>
            <option value="14">14 </option>
            <option value="15">15 </option>
            <option value="16">16 </option>
            <option value="17">17 </option>
            <option value="18">18 </option>
            <option value="19">19 </option>
            <option value="20">20 </option>
            <option value="21">21 </option>
            <option value="22">22</option>
            <option value="23">23</option>
          </select> hour(s)</td>
        </tr>
        <tr align="center">
          <td align="left" bgcolor="#E9E9E9"><div align="right"><font color="#FF8000"><strong>DAILY</strong></font></td>
          <td align="left" bgcolor="#E9E9E9">- run every: 
            <select class="button" name="days"  onchange="disable_others()"  >
            <option selected value="-1">0</option>
            <option value="1">1 </option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="4">4 </option>
            <option value="5">5 </option>
            <option value="6">6 </option>
          </select> day(s)</td>
        </tr>
        <tr align="center">
          <td align="left" bgcolor="#E9E9E9"><div align="right"><font color="#C00000"><strong>WEEKLY</strong></font></td>
          <td align="left" bgcolor="#E9E9E9">- run every: 
            <select class="button" name="weeks"  onchange="disable_others()" >
            <option selected value="-1">0</option>
            <option value="1">1 </option>
            <option value="2">2 </option>
            <option value="3">3 </option>
            <option value="4">4 </option>
            <option value="5">5 </option>
            <option value="6">6 </option>
            <option value="7">7 </option>
            <option value="8">8 </option>
            <option value="9">9 </option>
            <option value="10">10 </option>
            <option value="11">11 </option>
            <option value="12">12 </option>
            <option value="13">13 </option>
            <option value="14">14 </option>
            <option value="15">15 </option>
            <option value="16">16 </option>
            <option value="17">17 </option>
            <option value="18">18 </option>
            <option value="19">19 </option>
            <option value="20">20 </option>
            <option value="21">21 </option>
            <option value="22">22 </option>
            <option value="23">23 </option>
            <option value="24">24 </option>
            <option value="25">25 </option>
            <option value="26">26 </option>
            <option value="27">27 </option>
            <option value="28">28 </option>
            <option value="29">29 </option>
            <option value="30">30 </option>
            <option value="31">31 </option>
            <option value="32">32 </option>
            <option value="33">33 </option>
            <option value="34">34 </option>
            <option value="35">35 </option>
            <option value="36">36 </option>
            <option value="37">37 </option>
            <option value="38">38 </option>
            <option value="39">39 </option>
            <option value="40">40 </option>
            <option value="41">41 </option>
            <option value="42">42 </option>
            <option value="43">43 </option>
            <option value="44">44 </option>
            <option value="45">45 </option>
            <option value="46">46 </option>
            <option value="47">47 </option>
            <option value="48">48 </option>
            <option value="49">49 </option>
            <option value="50">50 </option>
            <option value="51">51</option>
            <option value="52">52</option>
          </select> week(s)</td>
        </tr>
        <tr bgColor="#ffffff" align="center">
          <td vAlign="top" align="right"></td>
          <td align="left" colspan="2"><div align="center"><center><p>Run this job: <select class="button" name="run_only_once" >
            <option selected value="0">until I delete it</option>
            <option value="1">just ONCE only</option>
          </select> 
           
          (when selecting to run <strong>just ONCE only</strong> the job will be deleted
          following the first run)</p>
          </center></div><div align="center"><center><p>&nbsp;<input class="button" type="button"
          onclick="add()" value="Add Job" name="button"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
          class="button" type="button" onclick="javascript:document.location='index.php'"
          value="Cancel" name="cancel"></p>
          </center></div><div align="center"></div></td>
        </tr>
</TBODY>
      </table>
      </center></div>
    </form>
    </th>
  </tr>
</table>
</center></div><script language="JavaScript"><!--
original_minutes=0;
original_hours=0;
original_days=0;
original_weeks=0;

the_link=self.location.hostname+self.location.pathname.replace("pjsfiles/","eg_email_site_stats_to_boss.php");
document.I_F.scriptpath.value="http://"+the_link;

function disable_others()
{
 validcount=0;
 with (document.I_F)
 {
  if (minutes.options[minutes.selectedIndex].value<0) validcount=validcount+minutes.options[minutes.selectedIndex].value *1; 
  if (hours.options[hours.selectedIndex].value<0) validcount=validcount+hours.options[hours.selectedIndex].value *1; 
  if (days.options[days.selectedIndex].value<0) validcount=validcount+days.options[days.selectedIndex].value *1;
  if (weeks.options[weeks.selectedIndex].value<0) validcount=validcount+weeks.options[weeks.selectedIndex].value *1; 
  if (validcount!=-3) 
  {
   minutes.value=-1;
   minutes.value=-1;
   hours.value=-1;
   days.value=-1;
   weeks.value=-1;
   alert("Only one can carry a value!  Please re-select.");
  }
 }
}
function add()
{
 with (document.I_F)
 {
  if ( (minutes.options[minutes.selectedIndex].value<0) & (hours.options[hours.selectedIndex].value<0) &(days.options[days.selectedIndex].value<0) & (weeks.options[weeks.selectedIndex].value<0) ) alert("Please select a period to run this script:\n\n MINUTES, HOURLY, DAILY or WEEKLY");
  else submit();
 }
}
// --></script>
