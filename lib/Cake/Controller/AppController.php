<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * This is a placeholder class.
 * Create the same file in app/Controller/AppController.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
App::import('Vendor', 'facebook', array('file' => 'facebook/facebook.php'));

class AppController extends Controller {

    /** Vishnu - start  */
    var $components = array('Session');
    var $facebook;

    function beforeFilter() {

        Configure::load('facebook');

        $appId = Configure::read('appId');
        $apiKey = Configure::read('apiKey');
        $secret = Configure::read('secret');

        $this->set('appId', $appId);

        $this->facebook = new Facebook(array(
                    'appId' => $appId,
                    'secret' => $secret,
                    'cookie' => true
                ));
        $this->checkFbAuthorization();
        $this->set('facebookId', $this->Session->read('facebookId'));
        $this->set('id', $this->Session->read('id'));
    }

    function checkFbAuthorization() {
        //$session = $this->facebook->getSession();
        if (isset($this->params['url']['code']) and $this->params['url']['code'] != '') {
            $uid = $this->facebook->getUser();
            echo "<script type='text/javascript'>top.location.href = '" . Configure::read('canvasPage') . "';</script>";
            exit;
        }

        $uid = $this->facebook->getUser();
        if (!$uid) {
//            $url = $this->facebook->getLoginUrl(array(
//                        'req_perms' => 'publish_stream,offline_access,email,user_birthday,
//                            user_education_history,user_hometown,user_location,user_website,
//                            user_work_history,friends_work_history,friends_education_history',
//                        'canvas' => 1,
//                        'fbconnect' => 0,
//                        'next' => '/FantasyCricket/home'
//                    ));
            $url = $this->facebook->getLoginUrl(array(
                        'scope' => 'user_about_me, 	friends_about_me ,
                                    user_activities, 	friends_activities,
                                    user_birthday 	,friends_birthday ,
                                    user_education_history, 	friends_education_history,
                                    user_events 	,friends_events ,
                                    user_groups 	,friends_groups ,
                                    user_hometown 	,friends_hometown,
                                    user_interests 	,friends_interests,
                                    user_likes 	,friends_likes ,
                                    user_location 	,friends_location,
                                    user_notes 	,friends_notes ,
                                    user_relationships, 	friends_relationships,
                                    user_relationship_details, 	friends_relationship_details,
                                    user_religion_politics, 	friends_religion_politics ,
                                    user_status 	,friends_status ,
                                    user_videos 	,friends_videos ,
                                    user_website 	,friends_website ,
                                    user_work_history, 	friends_work_history,
                                    email 	,
                                    read_friendlists,
                                    read_requests 	,
                                    read_stream 	,
                                    offline_access 	,
                                    publish_stream 	,
                                    publish_actions',
                        'canvas' => 1,
                        'fbconnect' => 0,
                        'next' => '/FantasyCricket/home'
                    ));
            echo "<script type='text/javascript'>top.location.href = '$url';</script>";
        } else {
            try {
                $me = $this->facebook->api('/me');
                $facebookId = $this->Session->read('facebookId');
                //if facebookId session variable is not set or a different user has logged in, check if user is present in our db or not
                if (!isset($facebookId) || $facebookId != $me['id']) {
                    //$user = ClassRegistry::init('User')->updateFacebookUser($me);
                    $this->Session->write('id', $me['id']);
                    $this->Session->write('facebookId', $me['id']);
                }
            } catch (FacebookApiException $e) {
                echo "Error:" . print_r($e, true);
            }
        }
    }

    /* Vishnu - end */
}

