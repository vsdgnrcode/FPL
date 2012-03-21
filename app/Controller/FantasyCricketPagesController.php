<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class FantasyCricketPagesController extends AppController{
    var $name = "FantasyCricketPages";

        
    function display(){
        $this->set('userInfo' , $this->facebook->api('/me'));
    }

    function staticPages(){
        //$this->render('static');
    }
}

?>