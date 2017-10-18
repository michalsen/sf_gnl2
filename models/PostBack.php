<?php
/**
 * class PostBack
 * Guzzle to gather data
 *
 * todo: map lead fields to SF
 */

class PostBack {


    public function __construct($leadID) {
      $this->lead = $this->getData($leadID);
    }

    // Call GNL
    private function getData($leadID) {
      $client = new GuzzleHttp\Client();
      $response = $client->request('GET', getenv('GNL_URL') . $leadID, [
        'headers' => [
          'X-ApiToken' => getenv('GNL_KEY'),
          'Accept' => 'application/json',
          'Content-type' => 'application/json'
         ]]);

      $response = json_decode($response->getBody());
      $result = get_object_vars($response->data);

      $lead = [];
      foreach ($result as $key => $value) {
        // Sometimes $value is an object....sometimes not
        if (is_object($value)) {
          foreach ($value as $objectKey => $objectValue) {
            $lead[$objectKey] = $objectValue;
          }
        }
         else {
           $lead[$key] = $value;
        }
      }
      return $lead;
   }

}



    // public $fields['gnl'] = ['0,1,caller_city,caller_name,caller_number,caller_postal_code,caller_state,classification,comments,date,duration,email,first_name,help,how_can_we_help,id,im_budget,interested_in,name,notes,phone,seogroup-form-email,seogroup-form-keyword,seogroup-form-name,source,status,trackable_number,type,website_budget,website_url','gnl'];

    // public $fields['sf'] = ['Website,Competitor_URL__c,Caller_City__c,LastName,Phone,Caller_Zip__c,Caller_State__c,Classification__c,Description,Lead_Date__c,Call_Duration__c,Email,FirstName,Description,Description,SNLID__c,Initial_Recurring_Monthly_Budget__c,Primary_Service_Interest__c,LastName,Phone_Call_Notes__c,Phone,Email,Keyword__c,FirstName,LeadSource,Call_Status__c,Trackable_Number__c,Lead_Type__c,Initial_Project_Budget__c,Website','mapped'];
