<?php ?>
<div class="row">
    <div  class="span8">
        <h3>Users in this group:</h3>
        <?php
        $sum = 0;
        $num = 0;
        foreach ($users as $user) {
            $num++;
            $name = $user['User']['name'];
            $score = $user['UserScore']['score'];
            $sum = $sum + $score;
            ?> <h2> <?php echo $name; ?></h2> <?php echo ' ' . $score; ?>  <br/> <?php
    }
        ?>
    </div>
    <div  class="span4">
        <h4>Group Points:</h4> <?php echo $sum / $num; ?>
    </div>
    <div  class="span4">
        <h3>Ask to join this group</h3>
        <form id="form_grp" name="form_grp" class="grp_form" enctype="multipart/form-data" method="post" novalidate
              action="<?php echo _APP_URL . '/'; ?>Group/create">
            <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Join" />
        </form> 
    </div>
</div>
<div class="row">
    <h3>Messages:</h3>
    <div  class="span12">
                <?php
        foreach ($comms as $comm) {
            $name = $comm['User']['name'];
            $comment = $comm['Comment']['text'];
            ?> <h2> <?php echo $name; ?></h2> <?php echo ' ' . $comment; ?>  <br/> <?php
    }
        ?>
    </div>
</div>