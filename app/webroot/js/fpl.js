
 // fpl
 
 //--------fpl----------------
			var selectedInFromBox = '';
			var selectedBatsmenCount = 0;
			var selectedBowlersCount = 0;
			var selectedKeepersCount = 0;
			var MAX_CURRENCY = 1000;
			var currency = MAX_CURRENCY;
			
			var MAX_BATSMEN = 7;
			var MAX_BOWLER = 7;
			
			var MAX_KEEPER = 1;
			
			var selectPlayers = new selectedPlayersObj();
			
			function addToCurrency(value, refreshCost)
			{
				
				if (currency + parseInt(value) > MAX_CURRENCY)
				{
					alert('something is wrong here!!');
				}
				else
				{
					currency = currency + parseInt(value);
					
					if (refreshCost != false)
						$('#currencyLeft').text(currency);
				}
			}
			
			function subtractFromCurrency(value, refreshCost)
			{
				if (currency - parseInt(value) < 1)
				{
					alert('Dont be so greedy!!');
				}
				else
				{
					currency = currency - parseInt(value);
					
					if (refreshCost != false)
						$('#currencyLeft').text(currency);
				}
				
			}
			
			function selectedPlayersObj()
			{
				this.player_bt_1 = new playerObject(null,'bt',null,1, 0);this.player_bt_2 = new playerObject(null,'bt',null,2, 0);this.player_bt_3 = new playerObject(null,'bt',null,3, 0);this.player_bt_4 = new playerObject(null,'bt',null,4, 0);this.player_bt_5 = new playerObject(null,'bt',null,5, 0);
				this.player_bw_1 = new playerObject(null,'bw',null,1, 0);this.player_bw_2 = new playerObject(null,'bw',null,2, 0);this.player_bw_3 = new playerObject(null,'bw',null,3, 0);this.player_bw_4 = new playerObject(null,'bw',null,4, 0);this.player_bw_5 = new playerObject(null,'bw',null,5, 0);
				this.player_wk_1 = new playerObject(null,'wk',null,1, 0);
			}
			
			function addToSelectedPlayers(key, playerObj)
			{
				
				if (selectPlayers[key].id != null)
				{
					alert('unexpected: method->addToSelectedPlayers: selectPlayers['+key+'].id is not null');
				}
				selectPlayers[key] = playerObj;
			}
			
			function getFromSelectedPlayers(key)
			{
				if (selectPlayers[key].id == null)
				{
					alert('unexpected: method->getFromSelectedPlayers: selectPlayers['+key+'].id is null');
				}
				return selectPlayers[key];
			}
			
			function removeFromSelectedPlayers(key)
			{
				if (selectPlayers[key].id == null)
				{
					alert('unexpected: method->removeFromSelectedPlayers: selectPlayers['+key+'] is null');
				}
				selectPlayers[key].id = null;
				selectPlayers[key].name = null;
			}
			
			function playerObject(id,type,name,slot, cost)
			{
				this.id=id;
				this.type=type;
				this.name=name;
				this.slot=slot;
				this.cost=cost;
			}
			
			function getFreeSlot(type)
			{
				
				for (var key in selectPlayers) 
				{
					
				   var obj = selectPlayers[key];
					
				   if (obj != null  && obj.type == type && obj.id == null)
				   {
						return obj.slot;
				   }
					
				}
				
				alert('unexpected: method-> no slot found for type: ' + type);
				return 0;
			}
	
			
			
 $(document).ready(function() {
 
	$('#currencyLeft').text(currency);			

	$(".player .removePlayer").hover(
        function() {
            $(this).next("img").fadeTo(200, 0.25).end();
        },
        function() {
            $(this).next("img").fadeTo(200, 1).end();
        });

	
	$('select[id^="fromSelectBox"]').dblclick(function() {
		$('#moveleft').click();
	});
	
	
	//Moving selected item(s) to left select box provided
	$('#moveleft').click(function() { 
		//If none of the items are selected, inform the user using an alert
		if(!isSelected("#fromSelectBox1") && !isSelected("#fromSelectBox2") && !isSelected("#fromSelectBox3")){return alert('no selection');} 
		
		var selectedObj = $(selectedInFromBox+' option:selected');
		var slot;
		
		var entryType = selectedObj.val().split("_");
		var playerName = selectedObj.text();
		var changeStatus = false;
		
		if (entryType[0] == 'bt')
		{
			
			if (selectedBatsmenCount < MAX_BATSMEN)
			{
				slot = getFreeSlot('bt');
				selectedObj.remove().appendTo('#toSelectBox');
				$('#player_bt_'+slot).css('display', 'block');
				
				addToSelectedPlayers('player_bt_' + (slot), new playerObject(entryType[1], 'bt', playerName, slot, entryType[2]));
				selectedBatsmenCount++;
				changeStatus = true;
				
			}
			else
			{
				alert('max batsmen reached');
			}
			
		}
		else if (entryType[0] == 'bw')
		{
			
			if (selectedBowlersCount < MAX_BOWLER)
			{
				slot = getFreeSlot('bw');
				selectedObj.remove().appendTo('#toSelectBox');
				$('#player_bw_'+slot).css('display', 'block');
				//selectPlayers['player_bw_' + selectedBowlersCount+1] = playerName;
				
				addToSelectedPlayers('player_bw_' + slot, new playerObject(entryType[1], 'bw', playerName, slot, entryType[2]));
				
				
				selectedBowlersCount++;
				changeStatus = true;
			}
			else
			{
				alert('max bowler reached');
			}
		}
		else
		{
			
			if (selectedKeepersCount < MAX_KEEPER)
			{
				slot = getFreeSlot('wk');
				selectedObj.remove().appendTo('#toSelectBox');
				$('#player_wk_'+slot).css('display', 'block');
				//selectPlayers['player_wk_' + selectedKeepersCount+1] = playerName;
				
				addToSelectedPlayers('player_wk_' + slot, new playerObject(entryType[1], 'wk', playerName, slot, entryType[2]));
				
				
				selectedKeepersCount++;
				changeStatus = true;
			}
			else
			{
				alert('max keeper reached');
			}
		}
		
		if (changeStatus == true)
		{
			subtractFromCurrency(entryType[2]);
		}
		
		return false;
	});
	
	$('#saveteam').click(function() { 
		
		var values = '';
		
		for (var key in selectPlayers) 
		{
		   var obj = selectPlayers[key];
		   
		   if (obj != null && obj.id != null)
		   {
				values+= '^' + obj.id + '_' + obj.slot;
		   }
			
		}

		if (values.length > 0)
		{
			values = values.substring(1);
		}

		var teamName = $('#teamNameTextBox').val();
		
		$.post('/FantasyCricket/fplsaveteam', {'updatedteam[]': values.split('^'), 'teamName':teamName }, function(){
		   alert('team saved');
		});

	});
	
	
	
	//Moving selected item(s) to right select box provided
	$('.removePlayer').click(function() { 
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		//if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;} 
		//If atleast one of the item is selected, initially the selected option would be 'removed' and then it is appended to 'fromSelectBox' (select box)
		//$('#toSelectBox option:selected').remove().appendTo('#fromSelectBox');
		
		var playerToRemove = getFromSelectedPlayers($(this).parent().attr('id'));
		
		if (playerToRemove == null || playerToRemove.id == null)
		{
			alert('unexpected: method-> removePlayer.click() : player to be removed is null');
			return;
		}
		
		$(this).parent().css('display', 'none');
		
		//var selectedObj = $('#toSelectBox option:'+$(this).parent().attr('id'));
		//var entryType = selectedObj.val().split("_")[0];
		//var playerName = selectedObj.text();
		
		
		
		if (playerToRemove.type == 'bt')
		{
			$('#fromSelectBox1').append( new Option(playerToRemove.name, playerToRemove.type+'_'+playerToRemove.id+'_'+playerToRemove.cost) );
			selectedBatsmenCount--;
			addToCurrency(playerToRemove.cost);
		}
		else if (playerToRemove.type == 'bw')
		{
			$('#fromSelectBox2').append( new Option(playerToRemove.name, playerToRemove.type+'_'+playerToRemove.id+'_'+playerToRemove.cost) );
			selectedBowlersCount--;
			addToCurrency(playerToRemove.cost);
		}
		else
		{
			$('#fromSelectBox3').append( new Option(playerToRemove.name, playerToRemove.type+'_'+playerToRemove.id+'_'+playerToRemove.cost) );
			selectedKeepersCount--;
			addToCurrency(playerToRemove.cost);
		}
		
		removeFromSelectedPlayers($(this).parent().attr('id'));
		
		return false;
	});
	
	//Moving selected item(s) to upwards
	$('#moveup').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If atleast one of the item is selected, through loop - the selected option would be moved upwards
		$('#toSelectBox option:selected').each(function(){$(this).insertBefore($(this).prev());});
		return false;
	});
	
	//Moving selected item(s) to upwards
	$('#movedown').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If atleast one of the item is selected, through loop - the selected option would be moved downwards
		var eleValue = $('#toSelectBox option:selected:last').next();
		$("#toSelectBox option:selected").each(function(){
			$(this).insertAfter(eleValue);
			eleValue = $(eleValue).next();
		});
		return false;
	});
	
	//Moving selected item(s) to topmost
	$('#topmost').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If the selected item(s) index is greater than first item (option) index then move that item to the first position
		if($('#toSelectBox option:selected').attr('index') > $('#toSelectBox option:first').attr('index')){
			$('#toSelectBox option:selected').insertBefore($('#toSelectBox option:first'));
		}
		return false;
	});
	
	$('#bottommost').click(function(){
		//If no items are present in 'toSelectBox' (or) if none of the items are selected inform the user using an alert	
		if(!noOptions("#toSelectBox") || !isSelected("#toSelectBox")){return;}
		//If the selected item(s) index is less than last item (option) index then move that item to the last position
		if($('#toSelectBox option:selected').attr('index') < $('#toSelectBox option:last').attr('index')){
			$('#toSelectBox option:selected').insertAfter($('#toSelectBox option:last'));
		}
		return false;
	});
	
	$('#fromSelectBox1').click(function() {
		 $('#fromSelectBox2 option').attr('selected', false);
		 $('#fromSelectBox3 option').attr('selected', false);
		 $('#toSelectBox option').attr('selected', false);	
	});
	
	$('#fromSelectBox2').click(function() {
		 $('#fromSelectBox1 option').attr('selected', false);
		 $('#fromSelectBox3 option').attr('selected', false);
		 $('#toSelectBox option').attr('selected', false);
	});
	
	$('#fromSelectBox3').click(function() {
		 $('#fromSelectBox2 option').attr('selected', false);
		 $('#fromSelectBox1 option').attr('selected', false);
		 $('#toSelectBox option').attr('selected', false);
	});
	
	$('#toSelectBox').click(function() {
		 $('#fromSelectBox2 option').attr('selected', false);
		 $('#fromSelectBox1 option').attr('selected', false);
		 $('#fromSelectBox3 option').attr('selected', false);
	});


});

function isSelected(thisObj){
	if (!$(thisObj+" option:selected").length){
		
		return 0;
	}
	selectedInFromBox = thisObj;
	return 1;
}

//Below function is to validate the select box, if none of the item(s) where present in the select box provided then it alerts saying 'There are no options to select/move' if select box has more than one item it returns true
function noOptions(thisObj){
	if(!$(thisObj+" option").length){
		alert("There are no options to select/move");
		return 0;
	}
	return 1;
}

//Below function is to de-select all items if any of the item(s) are selected
function clearAll(thisObj){
	$('#'+thisObj).each(function(){$(this).find('option:selected').removeAttr("selected");});
}//function close

//Below function is to select all items
function selectAll(thisObj){
	if(!noOptions("#"+thisObj)){return;}
	$('#'+thisObj+' option').each(function(){$(this).attr("selected","selected");});
}//function close

//Below function is to arrange all items in Ascending Order [this is used from plug-in which we have attached]
function ascOrderFunction(){
	$("#toSelectBox").sortOptions();
}//function close

//Below function is to arrange all items in Descending Order [this is used from plug-in which we have attached]
function desOrderFunction(){
	$("#toSelectBox").sortOptions(false);
}//function close


