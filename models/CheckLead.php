<?php

/**
 *  Check Lead History
 */
class CheckLead {
  public $checklead = array();

  public function __construct($checklead)
    {
      $check  = R::find( 'history', ' gnl_lead = ? ', [ $checklead ] );
      $this->id = $this->checklead($check);
    }

  public function checklead($checklead)
  {
    foreach ($checklead as $key => $value) {
       if (strlen($value->sf_lead) > 0) {
         return $value->sf_lead;
       }
    }
  }
}
