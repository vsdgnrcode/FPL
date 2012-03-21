<?php

#include_once "utils/constants.php";
#include_once "utils/util.php";
#include_once "config/jsonwrapper.php";
#include_once "libs/facebook/facebook.php";
#include_once "vendors/OAuth/OAuth.php";
#include_once "services/users_service.php";
//define("_APP_URL", "http://localhost:88/cakephp");

class GameController extends AppController {

    var $components = array("Cookie", "Email");

    function index() {
        $this->layout = "default";
    }

    function land() {
        
    }

    function home() {
        
    }

    function ipl_fantasy_cricket_scores() {
        $this->layout = "default";
        $this->render("Scores");
    }

    function change_fpl_cricket_team() {
        $this->layout = "default";
        App::uses('TeamsService', 'Services');
        $teamService = new TeamsService();


        $user_id = "1";
        $myteam = $teamService->findMyTeam($user_id);
        //CakeLog::write('debug', 'my team'. $myteam['Team']['players']);

        App::uses('PlayersService', 'Services');
        $playerService = new PlayersService();

        $myplayers = $playerService->getPlayerDetails($myteam['Team']['players']);
        $allplayers = $playerService->findAllPlayers($myteam['Team']['players']);


        $this->set('allplayers', $allplayers);
        $this->set('myplayers', $myplayers);
        $this->set('myplayers1', count($myplayers));
        $this->set('myteamname', $myteam['Team']['name']);

        //CakeLog::write('debug', 'team name is '. $myteam['Team']['name']);


        $this->render("fpl");
    }

    function player_details_page() {
        $this->layout = "default";


        $this->render("playerdetails");
    }

    function fplsaveteam() {
        //$status  = $this->Session->read("loggedIn");
        // $this->autoRender = false;
        //$status = "login";
        //return $status;
        $this->layout = "default";
        $selectPlayers = array(); //do u need to initialise??
        $selectPlayers = $_POST["updatedteam"];
        asort($selectPlayers);


        $teamName = $_POST["teamName"];
        CakeLog::write('activity', 'teamname iss ' . $teamName);
        $selectedPlayersCSV = implode(',', $selectPlayers);
        CakeLog::write('debug', 'sorted ' . $selectedPlayersCSV);
        CakeLog::write('activity', 'new team ' . $selectedPlayersCSV);
        //$user = $this->Session->read("user");
        $user_id = "1";
        $teamService = new TeamsService();
        $myteam = $teamService->findMyTeam($user_id);

        CakeLog::write('activity', 'old team ' . $myteam ['Team']['name'] . '--' . $myteam ['Team']['id'] . '--'
                . $myteam ['Team']['userid'] . '--' . $myteam ['Team']['players']);

        CakeLog::write('debug', 'sorted ' . $selectedPlayersCSV[0]);

        $newteam['Team']['players'] = $selectedPlayersCSV;

        $newteam['Team']['name'] = $teamName;
        $newteam['Team']['id'] = $myteam ['Team']['id'];
        $newteam['Team']['userid'] = $myteam ['Team']['userid'];

        CakeLog::write('activity', 'new team ' . $newteam ['Team']['name'] . '--' . $newteam ['Team']['id'] . '--'
                . $newteam ['Team']['userid'] . '--' . $newteam ['Team']['players']);

        $teamService->updatePlayers($newteam);
    }

    function fpl_backup() {
        $this->layout = "default";
        if ($this->Session->read("loggedIn")) {
            $teamService = new TeamsService();
            $user = $this->Session->read("user");
            $myteam = $teamService->findMyTeam($user['User']['id']);

            $playerService = new PlayersService();

            $myplayers = $playerService->getPlayerDetails($myteam['Team']['players']);
            $allplayers = $playerService->findAllPlayers($myteam['Team']['players']);

            $this->Session->write('players', $allplayers);
            $this->Session->write('myplayers', $myplayers);
            $this->Session->write('myplayers1', count($myplayers));
            $this->Session->write('myteamname', $myteam['Team']['name']);

            $this->render("/users/fpl");
        } else {
            
        }
    }

    function login() {
        
    }

    function log($data) {
        $fh = fopen(CAKE_CORE_INCLUDE_PATH . "/app/tmp/logs/activity.log", 'a');
        $today = date("D M j G:i:s T Y");
        fwrite($fh, $today . ":" . $data . "\n");
        fclose($fh);
    }

    public function fbtest() {
        $this->layout = "default";
        $this->render("fbtest");
    }

}

?>
