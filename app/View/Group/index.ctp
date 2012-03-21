<?php ?>
<script type="text/javascript" src="<?php echo _APP_URL . '/'; ?>js/auto.js"></script>
<div class="row">
    <div  class="span8">
        <h3>Create a group:</h3>
        <form id="form_grp" name="form_grp" class="grp_form" enctype="multipart/form-data" method="post" novalidate
              action="<?php echo _APP_URL . '/'; ?>Group/create">

            <label class="desc" id="title1" for="Field1">
                Name
                <span id="req_1" class="req">*</span>
            </label>
            <input id="Field1" name="Field1" type="text" class="field text medium" value="" maxlength="255" tabindex="1" onkeyup="" required />
            <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit" />
        </form> 
        <h3>Search For a Group:</h3>
        <input id="Field1" name="Field1" type="text" class="field text medium" value="" maxlength="255" tabindex="1" onkeydown="autocomp.keydown(this, event,'<?php echo _APP_URL . '/'; ?>Group/search')" required />
        <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Go" />    
    </div>
    <div  class="span8">
        <h3>Top groups:</h3>
        <?php
        foreach ($grps as $grp) {
            $name = $grp['Group']['group_name'];
            ?> <a href="<?php echo _APP_URL . '/'; ?>Group/view/<?php echo $name; ?>"> <?php echo $name; ?></a> <br/> <?php
    }
        ?>
    </div>
</div>
<div id="auto_id"></div>
<script type="text/javascript">
    autocomp.init();
</script>