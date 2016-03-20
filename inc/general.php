

<form action="options.php" method="post">
<?php  settings_fields('general_settings_group');       ?>
<?php  do_settings_sections('general_settins');       ?>
<?php  submit_button();       ?>


</form>