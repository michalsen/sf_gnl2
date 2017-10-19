<?php
/**
 * class LeadMap
 * Map gnl to sf leads
 *
 */


class LeadMap
  {

    public function __construct($leadData) {
      $this->leadMapped = $this->mapData($leadData);
    }

    private function mapData($leadData) {
      $fields = fieldMap();
      return $leadData;
    }

  }


function fieldMap() {

  $fields['gnl'] = [0,1,'caller_city','caller_name','caller_number','caller_postal_code','caller_state','classification','comments','date','duration','email','first_name','help','how_can_we_help','id','im_budget','interested_in','name','notes','phone','seogroup-form-email','seogroup-form-keyword','seogroup-form-name','source','status','trackable_number','type','website_budget','website_url'];

  $fields['sf'] = ['Website','Competitor_URL__c','Caller_City__c','LastName','Phone','Caller_Zip__c','Caller_State__c','Classification__c','Description','Lead_Date__c','Call_Duration__c','Email','FirstName','Description','Description','SNLID__c','Initial_Recurring_Monthly_Budget__c','Primary_Service_Interest__c','LastName','Phone_Call_Notes__c','Phone','Email','Keyword__c','FirstName','LeadSource','Call_Status__c','Trackable_Number__c','Lead_Type__c','Initial_Project_Budget__c','Website','Company'];

  foreach ($fields['gnl'] as $key => $element) {
    $fieldMapped[$element] = $fields['sf'][$key];
  }

  return $fieldMapped;
}
