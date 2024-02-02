<?php

class Ctrl
{

  public function __construct(){}

  public function getEquipes(){
    require('wrk.php');
    return getEquipesFromDB();
  }
}


?>