<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PagesController extends AppController{
    var $name = "Pages";
    var $uses = array('User','UserFriend');

    function display(){
        $user = $this->facebook->api('/me');
        $userfriends = $this->facebook->api('/me/friends');
        if(!$this->User->findByFbid($user['id'])){
            //enable it after creating the message/process queue in the server
//            $this->User->create();
//            $this->User->save(array('name'=>$user['name'], 'fbid'=>$user['id'], 'access_key'=>'', 'joined_on'=>date("Y-m-d")));
//            foreach($userfriends as $userfriend){
//                if(!$this->User->findByIdAndFriendFbid($user['id'],$userfriend['id'])){
//                    $this->User->save(array($user['id'], $userfriend['id'], '', date("Y-m-d")));
//                }
//            }
        }else{
            //enable it after creating the message/process queue in the server
//            foreach($userfriends['data'] as $userfriend){
//                if(!$this->UserFriend->findByIdAndFriendFbid($user['id'],$userfriend['id'])){
//                    $this->UserFriend->create();
//                    $this->UserFriend->save(array('user_id'=>$user['id'], 'friend_fbid'=>$userfriend['id'], 'as_on'=>date("Y-m-d")));
//                }
//            }
        }
    }

    function staticPages(){
        //$this->render('static');
    }
}

?>
