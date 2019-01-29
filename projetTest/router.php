<?php
  include_once('controller.php');
  include_once('exception.php');
try{

  $controller = new Controller();
  $controller->index();

}catch(DivisionException $e){
  include_once('divisionError.php');

} catch(AdminException $e){
  include_once('AdminError.php');

} catch(Exception $e){
  include_once('generalError.php');

}
