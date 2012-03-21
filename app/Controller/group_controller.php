<?php
#include_once "utils/constants.php";
#include_once "utils/util.php";
#include_once "config/jsonwrapper.php";
#include_once "libs/facebook/facebook.php";
#include_once "vendors/OAuth/OAuth.php";
#include_once "services/users_service.php";

class GroupController extends AppController {
    var $components = array("Cookie", "Email");

    function index()
    {
        $this->layout = "default"; 
        App::import('model', 'Group');
        $grp_model = new Group();
        $grp = $grp_model->find('all');
        $this->set('grps',$grp);   
        
    }
     function create()
    {
        $this->layout = "default";
        $msg = '';
         if (empty($this->data)) {   // No data from form
           // $this->redirect('/Group');
             $msg = 'Group could not be created. Please try again.'; 
        }
        //echo count($_POST);
        $name = $this->data['Field1'];
        App::import('model', 'Group');
        $grp_model = new Group();
        $grp = $grp_model->find("first", array("conditions" => array("Group.group_name = " => $name)));
        if (empty($grp)) { // Create a new group
            $data['Group']['group_name'] = $name;
            $data['Group']['created_by'] = 1;
            $data['Group']['created_on'] = Date("Y/m/d");
            $ret = $grp_model->save($data);
            if ($ret)
                $msg = 'Group created succesfully.';
        }
        else {
            $msg= 'Group name already exists. Please select a different name for your group.';            
        }
        
         $this->set('msg',$msg);            
    }
    function view($name)
    {
        $this->layout = "default";
        $msg = '';
         if (!$name || $name == '') {   // No data from form
            $this->redirect('/Group'); 
        }
        App::import('model','UserGroup');
        $usergrp_model = new UserGroup();
        $ret = $usergrp_model->find('all',array("conditions" => array("Group.group_name = " => $name)));
        //var_dump($ret);
         App::import('model','UserComment');
        $usercomm_model = new UserComment();
        $comments = $usercomm_model->find('all',array("conditions" => array("Group.group_name = " => $name)));
        //var_dump($comments);
        $this->set('users',$ret);
        $this->set('comms',$comments);
    }


    function search($grp_name)
    {
        $this->autoRender = false;
        $grp = array();
        $i = 0;
        $search_term = '%' . $grp_name . '%';
        App::import('model', 'Group');
        $grp_model = new Group();
        $ret = $grp_model->find("all", array("conditions" => array("Group.group_name LIKE " => $search_term)));
        foreach ($ret as $v)
        {
            $grp[$i]['name'] = $v['Group']['group_name']; 
            $i++;
        }
        $cats = json_encode($grp);
        
        echo $cats;
    }
    function ipl_fantasy_cricket_scores() {
        $this->layout = "default";
        $this->render("Scores");
    }

    function change_fpl_cricket_team($uid) {
        App::import('model','Team');
        $team_model = new Team();
        App::uses('TeamsService','Services');
        $teamService = new TeamsService();
        print_r($this->Session->read());
        //var_dump($this->Session->read('user_id'));
        $myteam = $teamService->findMyTeam($uid);
        //CakeLog::write('debug', 'my team'. $myteam['Team']['players']);

        App::uses('PlayersService','Services');
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

    function log($data) {
        $fh = fopen(CAKE_CORE_INCLUDE_PATH . "/app/tmp/logs/activity.log", 'a');
        $today = date("D M j G:i:s T Y");
        fwrite($fh, $today . ":" . $data . "\n");
        fclose($fh);
    }
}
?>
