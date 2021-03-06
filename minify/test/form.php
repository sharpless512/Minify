<?php

require '../config.php';
require '../libs/Form.php';
require '../libs/Database.php';

if (isset($_REQUEST['run'])) {
  var_dump($_REQUEST);
  try {
    
    $form = new Form();

    $form->post('name')
          ->val('minlength', 2)
		      ->post('age')
          ->val('minlength', 2)
          ->val('digit')
		      ->post('gender');
    
    $form->submit();
    
    echo 'The form passed!';
    $data = $form->fetch();
    
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    
    // INSERT TO DATABASE
      
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}
?>

<form method="post" action="?run">
  Name <input type="text" name="name" />
  Age <input type="text" name="age" />
  Gender <select name="gender">
    <option value="m">Male</option>
    <option value="f">Female</option>
  </select>
  <input type="submit" />
</form>