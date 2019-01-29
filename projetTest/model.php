<?php

class Calculette {

  public function division($x,$y)
  {

    if($y!==0)
    {
      return $x/$y;
    } else {
      throw new DivisionException("Impossible de diviser par 0");

    }

  }
}
