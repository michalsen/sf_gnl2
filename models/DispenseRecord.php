<?php

/**
 *  Add / Update db record
 */
class DispenseRecord {
  public $dispense = array();

  public function __construct($dispense)
    {
      $this->dispense = $this->record($dispense);
    }

  public function record($dispense)
  {
    $record = R::dispense('history');
    $record->gnl_lead = $dispense[0];
    $record->sf_lead  = $dispense[1];
    $record->response = $dispense[2];
    $record->status   = $dispense[3];
    $record->audit   = date("Y-m-d H:i:s");
    $id = R::store($record);
      return $dispense;
    }
}


function newLead($check_lead){
  print '<pre>';
  print_r($check_lead->gnlid);
    if (!isset($check_lead->checklead)) {
        //$response = $ENT->create($new_lead, 'lead');
          $response = [];
        if (isset($response[0]->errors)) {
          $record = array($gnl_lead, NULL, $response[0]->errors[0]->message . ' ' . $response[0]->errors[0]->statusCode, 'error');
          $dispense = new DispenseRecord($record);
        }
        else
        {
           $record = array($mapData->leadMapped->lead['id'], 0, 'success', 'new');
           $dispense = new DispenseRecord($record);
         }
   }
     else {
     $lead['SNLID__c'] = 'test';
     // $gnlLead = new GetLead($lead['SNLID__c']);

       $salesMapping = [
            1 => '005A0000000QoJS',
            2 => '005A00000040XZV',
            3 => '005A0000000QoJY',
            4 => '005A0000004Uu79',
            5 => '005A0000007SA91',
            6 => '005A0000008BLsS'
          ];

       // Update Lead
       $gnlObject = new stdClass();
       $gnlObject->ID = $check_lead->checklead;
       $gnlObject->Classification__c = $lead['Classification__c'];
       $gnlObject->Lead_Date__c = $lead['Lead_Date__c'];
       $gnlObject->Phone_Call_Notes__c = $lead['notes'];

           foreach ($lead as $ckey => $cvalue) {
             if ($ckey == 'Phone_Call_Notes__c') {
               $salesUpdate = $cvalue;
             }
           }
       //$gnlObject->User__c = $salesMapping[$salesUpdate];

       // $response = $ENT->update(array ($gnlObject), 'Lead');
       $record = array($gnl_lead, $check_lead->checklead, 'success', 'update');
       $dispense = new DispenseRecord($record);
   }
}
