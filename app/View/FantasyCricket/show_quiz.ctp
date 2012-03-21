<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

 $questionArr = $this->getVar('quizform');
 foreach($questionArr as $quesAns){
     $question = $quesAns[0];
     $answers = $quesAns[1];

     ?>

<div class="box_3">
    <form id="UserQuizForm" method="post" action="/cakephp/FantasyCricket/SaveQuiz">
    
        <div>
            <h3><?php echo $question['QuizQuestion']['question']; ?></h3>
        </div>
        <?php
             foreach ($answers as $answer){
                 ?>
                 <div><p>
                     <input type="<?php echo $question['QuizQuestion']['answer_type']; ?>"
                            name="<?php echo $question['QuizQuestion']['id']; ?>"
                            value="<?php echo $answer['QuizAnswer']['id']; ?>" /><?php echo $answer['QuizAnswer']['answer']; ?>
                     </p>
                </div>
                 <?php
             }
        ?>

        <div>
<!--        to-do: try changing into an image -->
        <input name="quizpoints" type="hidden" value="<?php echo $this->getVar('attempt_points');  ?>"/>
        <input name="quesidentifier" type="hidden" value="<?php echo $question['QuizQuestion']['id'];  ?>"/>
        <input name="quizidentifier" type="hidden" value="<?php echo $question['QuizQuestion']['quiz_id'];  ?>"/>
        <input name="saveQuiz" type="submit" value="Finish" />
        </div>
    </form>
</div>

<?php

 }
?>
