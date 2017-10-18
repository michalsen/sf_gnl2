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




