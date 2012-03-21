<?php


class PlayersService {
    var $uses = array("Players");

    
    /**
     * Fetches user details for an email ID
     * @param String $email User email ID
     * @return Array User details
     
    function getDeals($email) {
        App::import('model', 'UserDetail');
        $user_details_model = new UserDetail();
        return $user_details_model->find("first", array("conditions" => array("UserDetail.email = " => $email)));
    }
     *
     *
     */

   

    function updatePlayers($dealRef) {
        App::import('model','BoughtDeal');
        $deal_model = new BoughtDeal();
        return $deal_model->save($dealRef);
    }

    function findAllPlayers($myplayers){
        App::import('model','Player');
        $player_model = new Player();
        $results = NULL;
        $playersReplaced = explode(',',$myplayers);
		$slots = array("_1", "_2", "_3", "_4", "_5");
		$playersReplaced_withoutslots = str_replace($slots, "", $playersReplaced);
		
		
        $results['bt'] = $player_model->find("all", array("conditions" => array("status = " => 0, "category = " => "bt", "NOT" => array("id " => $playersReplaced_withoutslots))));
		$results['bw'] = $player_model->find("all", array("conditions" => array("status = " => 0, "category = " => "bw", "NOT" => array("id " => $playersReplaced_withoutslots))));
		$results['wk'] = $player_model->find("all", array("conditions" => array("status = " => 0, "category = " => "wk", "NOT" => array("id " => $playersReplaced_withoutslots))));
        
		return $results;
    }

	function getPlayerDetails($players){
        App::import('model','Player');
        $player_model = new Player();
        CakeLog::write('debug', '$players is ' . $players);
		$playersReplaced = explode(',',$players);
		
		$slots = array("_1", "_2", "_3", "_4", "_5");
		$playersReplaced_withoutslots = str_replace($slots, "", $playersReplaced);
		
		//CakeLog::write('debug', 'playersReplaced_withoutslots -> '. $playersReplaced_withoutslots[1]);
		$results = $player_model->find("all", array("conditions" => array("status = " => 0, "id " => $playersReplaced_withoutslots), 'order' => array('id')));
		//CakeLog::write('debug', 'playersReplaced_withoutslots -> '. $playersReplaced_withoutslots[1]);
		$index = 0;
		foreach ($results as $result):
		
			CakeLog::write('debug', 'rreplced from  '. $result['Player']['id'] . ' to '. $playersReplaced[$index]);
			$result['Player']['id'] = $playersReplaced[$index];
			$results[$index] = $result;
			$index++;
			
		endforeach;
		
		return $results;
    }

    
    private function log($data) {
        $fh = fopen(CAKE_CORE_INCLUDE_PATH."/app/tmp/logs/activity.log", 'a');
        $today = date("D M j G:i:s T Y");
        fwrite($fh, $today.":".$data."\n");
        fclose($fh);
    }
}
?>
