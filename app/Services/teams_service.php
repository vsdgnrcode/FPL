<?php

include_once "Utils/constants.php";


class TeamsService {
    var $uses = array("Teams");

    
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

   

    function updatePlayers($teamObj) {
        App::import('model','Team');
        $team_model = new Team();
        return $team_model->saveAll($teamObj);
    }

    function findMyTeam($userid){
        App::import('model','Team');
        $team_model = new Team();
        $myteam = NULL;
        
        $myteam = $team_model->find("first", array("conditions" => array("userid = " => $userid)));
        
		return $myteam;
    }
	
	
    
    private function log($data) {
        $fh = fopen(CAKE_CORE_INCLUDE_PATH."/app/tmp/logs/activity.log", 'a');
        $today = date("D M j G:i:s T Y");
        fwrite($fh, $today.":".$data."\n");
        fclose($fh);
    }
}
?>
