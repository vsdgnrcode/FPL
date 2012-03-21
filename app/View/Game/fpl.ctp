 <link type="text/css" rel="stylesheet" href="<?php echo _APP_URL . '/'; ?>css/test.css" />
 <link href="<?php echo _APP_URL . '/'; ?>css/tabbedContent.css" rel="stylesheet" type="text/css" />
 <script language="javascript" type="text/javascript" src="<?php echo _APP_URL . '/'; ?>js/jquery.min.js"></script>
 <script src="<?php echo _APP_URL . '/'; ?>js/tabbedContent.js" type="text/javascript"></script>
 <script src="<?php echo _APP_URL . '/'; ?>js/fpl.js" type="text/javascript"></script>
<style type="text/css">
.fantasy-cricket-scores .span7{
    margin-bottom: 20px;
    background-color: #fff;
	float:left;
    border-color: #333;
    color:#000;
    -webkit-border-radius: 6px 6px 6px 6px;
       -moz-border-radius: 6px 6px 6px 6px;
            border-radius: 6px 6px 6px 6px;
    -webkit-box-shadow: 0 1px 2px #fff;
       -moz-box-shadow: 0 1px 2px #fff;
            box-shadow: 0 1px 2px #fff;
}

.fantasy-cricket-scores .span7 h2{
    text-align: center;
    color:#333;
    text-decoration: underline;
}

.player {
		position: relative;

}

.player .removePlayer{
		
        position: absolute;
        right: 5px;
        top: 5px;
		margin-top: -20px;
        z-index: 2;

}
</style>

<div class="main-container col1-layout">
	<div class="main">
		<div class="col-main">
			<div class="full-top">&nbsp;</div>
			<div class="account-login full">
			
				<div class="page-title">
					<h1>
					
						Team Name:
						<input id="teamNameTextBox" type="text" value="<?php echo $myteamname; ?>"/>
					</h1>
				</div>
 
 


<!-- Container -->
<div id="container">
 <!-- To Container -->
 <div class="fantasy-cricket-scores">
  <div class="row">
        <div class="span7">
		
		
		<img id="pitchimg" src="<?php echo _APP_URL . '/'; ?>images/pitch.png"/>
<div id="player_bt_1" class="player" style="position: absolute; z-index: 30; margin-left:60px; margin-top:-360px; display:none;">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/batsman_fpl.png"/>
</div>
<div id="player_bt_2"  class="player" style="position: absolute; z-index: 30; margin-left:160px; margin-top:-460px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/batsman_fpl.png"/>
</div>
<div id="player_bt_3"  class="player" style="position: absolute; z-index: 30; margin-left:300px; margin-top:-460px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/batsman_fpl.png"/>
</div>
<div id="player_bt_4"  class="player" style="position: absolute; z-index: 30; margin-left:400px; margin-top:-360px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/batsman_fpl.png"/>
</div>
<div id="player_bt_5"  class="player" style="position: absolute; z-index: 30; margin-left:30px; margin-top:-270px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/allrounder_fpl.png"/>
</div>
<div id="player_bw_5"  class="player" style="position: absolute; z-index: 30; margin-left:430px; margin-top:-270px;  display:none;">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/allrounder_fpl.png"/>
</div>
<div id="player_wk_1" class="player"  style="position: absolute; z-index: 30; margin-left:225px; margin-top:-400px;  display:none;">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/wkeeper_fpl.png"/>
</div>
<div id="player_bw_1"  class="player" style="position: absolute; z-index: 30; margin-left:140px; margin-top:-210px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/bowler_fpl.png"/>
</div>
<div  id="player_bw_2" class="player"  style="position: absolute; z-index: 30; margin-left:320px; margin-top:-210px;  display:none;">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/bowler_fpl.png"/>
</div>
<div  id="player_bw_3"  class="player" style="position: absolute; z-index: 30; margin-left:87px; margin-top:-133px; display:none; ">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/bowler_fpl.png"/>
</div>
<div  id="player_bw_4" class="player"  style="position: absolute; z-index: 30; margin-left:370px; margin-top:-133px;  display:none;">
	<div class="removePlayer"><a href="javascript:void(0);">x</a></div>
	<img src="<?php echo _APP_URL . '/'; ?>images/bowler_fpl.png"/>
</div>



           <div class="to_container" style="display:none;">
				 <select id="toSelectBox" multiple="multiple" size="11">
				 
				<?php
							foreach ($myplayers as $player):	
								
				?>	
									 <option value="<?php echo $player['Player']['category']; ?>_<?php echo $player['Player']['id']; ?>"><?php echo $player['Player']['name']; ?></option>
				<?php
							endforeach;
				?>	
				 
				 
				 </select><br />
			 </div>
        </div>
        
    
 
 <!-- To Container [Close] -->
 <!-- Buttons Container -->
 

        <div class="span7">
				 <div style="float:right;">
					 <a id="moveright" href="javascript:void(0);"> ==> </a>
					 <a id="moveleft"  href="javascript:void(0);"> <== </a>
					 
				</div>
		</div>

 
 <!-- Buttons Container [Close] -->
 
 
 <!-- From Container -->
 
        <div class="span7">
		
		
		





						  <div class="from_container" >
						  <div class='tabbed_content'>
							<div class='playerTypeTabs'>
								<span class='moving_bg'>
									&nbsp;
								</span>
								<span class='tab_item'>
									Batsmen
								</span>
								<span class='tab_item'>
									Bowler
								</span>
								<span class='tab_item'>
									W Keeper
								</span>
								
							</div>
						 
							<div class='slide_content'>
								<div class='tabslider' >
								
									
									<ul>
										<li>
											
											<select id="fromSelectBox1" multiple="multiple">
								<?php
									
									foreach ($allplayers['bt'] as $batsman):
									
									?>	
												 <option class="playeroption" value="bt_<?php echo $batsman['Player']['id']; ?>"><?php echo $batsman['Player']['name']; ?></option>
									<?php
									endforeach;
								?>	
											 </select>
										</li>
									</ul>
									<ul>
										<li>
											<select id="fromSelectBox2" multiple="multiple">
								
								<?php
									foreach ($allplayers['bw'] as $bowler):
								?>	
											 <option class="playeroption" value="bw_<?php echo $bowler['Player']['id']; ?>"><?php echo $bowler['Player']['name']; ?></option>
								<?php
									endforeach;
								?>	
											 </select>
										</li>
									</ul>
									<ul>
										<li>
											 <select id="fromSelectBox3" multiple="multiple">
								<?php
									foreach ($allplayers['wk'] as $keeper):
								?>	
											 <option class="playeroption" value="wk_<?php echo $keeper['Player']['id']; ?>"><?php echo $keeper['Player']['name']; ?></option>
								<?php
									endforeach;
								?>	
											 </select>	
										</li>
									</ul>
									
						 
								</div>
							</div>
						</div>

						 </div>
						 </div>
 
   </div>
   </div>
 <!-- From Container [Close] -->

 <div style="clear:both"></div>
 <input type="image" id="saveteam" value="Save Changes"/><br />
</div>
</div>
<!-- Container [Close] -->
<div class="full-btm">&nbsp;</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function showPlayer(id)
	{
		
		var elem = document.getElementById(id);
		if (elem == null)
		{	
			alert('unexpected : method -> showPlayer:  could not find element ' + id);
		}
		elem.style.display = 'block';
	}
	
	var playeridWithSlot;
	var playerName;
	var playerType;
				<?php
					foreach ($myplayers as $player):	
								
				?>	
						
						playeridWithSlot = '<?php echo $player['Player']['id']; ?>'.split('_');
						playerName = '<?php echo $player['Player']['name']; ?>';
						playerType = '<?php echo $player['Player']['category']; ?>'; 
						
						if (playerType == 'bt')
						{
							selectedBatsmenCount++;
							showPlayer('player_bt_' + playeridWithSlot[1]);
							addToSelectedPlayers('player_bt_' + playeridWithSlot[1], new playerObject(playeridWithSlot[0], 'bt', playerName, playeridWithSlot[1]));
						}
						else if (playerType == 'bw')
						{
							selectedBowlersCount++;
							showPlayer('player_bw_' + playeridWithSlot[1]);
							addToSelectedPlayers('player_bw_' + playeridWithSlot[1], new playerObject(playeridWithSlot[0], 'bw', playerName, playeridWithSlot[1]));
						}
						else
						{
							selectedKeepersCount++;
							showPlayer('player_wk_' + playeridWithSlot[1]);
							addToSelectedPlayers('player_wk_' + playeridWithSlot[1], new playerObject(playeridWithSlot[0], 'wk', playerName, playeridWithSlot[1]));
						}
						
						
				<?php
					endforeach;
				?>	
				
				
</script>