<?php

class IndexController extends AppController {

    var $components = array("Cookie", "Email");

   function land() {
        
    }

    function home() {
        
    }
    function index()
    {
        $this->layout = "default";        
    }

    function ipl_fantasy_cricket_scores() {
        $this->layout = "default";
        $this->render("Scores");
    }

    function change_fpl_cricket_team() {

        $teamService = new TeamsService();

        $user_id = "1";
        $myteam = $teamService->findMyTeam($user_id);
//CakeLog::write('debug', 'my team'. $myteam['Team']['players']);

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

    function fplsaveteam() {
//$status  = $this->Session->read("loggedIn");

        $this->autoRender = false;
//$status = "login";
//return $status;

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
}
?>
