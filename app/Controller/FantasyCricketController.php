<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class FantasyCricketController extends AppController {

    var $name = "FantasyCricket";
    var $uses = array('Quiz', 'QuizQuestion', 'QuizAnswer', 'UserAnswer', 'UserPoint');

    function land() {

    }

    function home() {
        $this->layout='defaultothr';
        $this->set('userInfo', $this->facebook->api('/me'));
    }

    function cricketPrizeQuiz() {
        $this->layout='defaultothr';

    }

    function inviteFriendsChallenge() {
        $this->layout='defaultothr';

    }

    function oneLinerChallenge() {
        $this->layout='defaultothr';

    }

    function showQuiz($id) {
        $quiz = $this->Quiz->findById($id);
        $quiz_form = array();
        if ($quiz) {
            $questions = $this->QuizQuestion->findAllByQuizId($quiz['Quiz']['id']);
            foreach ($questions as $question) {
                $answers = $this->QuizAnswer->findAllByQuizIdAndQuestionId($quiz['Quiz']['id'], $question['QuizQuestion']['id']);
                $quesans = array($question, $answers);
                array_push($quiz_form, $quesans);
            }
            $this->set('quizform', $quiz_form);
            $this->set('attempt_points', $quiz['Quiz']['attempt_points']);
        }
        $this->layout='defaultothr';
    }

    function saveQuiz() {
        if ($this->request->is('post')) {
            $postdata = $this->request->data;
            $answered = $this->UserAnswer->findByQuestionIdAndUserFbid($postdata['quesidentifier'], $this->Session->read('facebookId'));
            if (!$answered) {
                $this->UserAnswer->create();
                $points_earned = $this->UserPoint->findByQuizIdAndUserFbid($postdata['quizidentifier'], $this->Session->read('facebookId'));
                if(!$points_earned){
                    $this->UserPoint->create();
                    $this->UserPoint->save(array('quiz_id' => $postdata['quizidentifier'], 'user_fbid' => $this->Session->read('facebookId'), 'points_earned' => $postdata['quizpoints'], 'earned_date' => date("Y-m-d")));
                }
            }else{
                $this->UserAnswer->id = $answered['UserAnswer']['id'];
            }
            $this->UserAnswer->save(array('quiz_id' => $postdata['quizidentifier'], 'question_id' => $postdata['quesidentifier'], 'answer_id' => $postdata[$postdata['quesidentifier']], 'user_fbid' => $this->Session->read('facebookId')));
        }
    }

   
	

}

?>