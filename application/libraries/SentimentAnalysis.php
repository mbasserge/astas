<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SentimentAnalysis {

    protected $datumbox_api_key; //Your Datumbox API Key. Get it from http://www.datumbox.com/apikeys/view/
    protected $consumer_key; //Your Twitter Consumer Key. Get it from https://dev.twitter.com/apps
    protected $consumer_secret; //Your Twitter Consumer Secret. Get it from https://dev.twitter.com/apps
    protected $access_key; //Your Twitter Access Key. Get it from https://dev.twitter.com/apps
    protected $access_secret; //Your Twitter Access Secret. Get it from https://dev.twitter.com/apps 

    /**
     * The constructor of the class
     * 
     * @param string $datumbox_api_key   Your Datumbox API Key
     * @param string $consumer_key       Your Twitter Consumer Key
     * @param string $consumer_secret    Your Twitter Consumer Secret
     * @param string $access_key         Your Twitter Access Key
     * @param string $access_secret      Your Twitter Access Secret
     * 
     * @return TwitterSentimentAnalysis  
     */
    // public function __construct($datumbox_api_key, $consumer_key, $consumer_secret, $access_key, $access_secret){

    function __construct() {
        //
        $this->ci = & get_instance();
        // get main CI object
        // $this->CI = & get_instance();
        // Load the session library
        $this->ci->load->library('session');

        // Load the configuration
        // $this->CI->load->config('datumbox');
        $this->ci->config->load('datumbox');

        // Load DatumboxAPI librairie
        $this->ci->load->library('datumboxapi');
        $this->ci->load->library('twitterapiclient');

        $this->datumbox_api_key = $this->ci->config->item('datumbox_api_key');

        $this->consumer_key = $this->ci->config->item('consumer_key');
        $this->consumer_secret = $this->ci->config->item('consumer_secret');
        $this->access_key = $this->ci->config->item('access_key');
        $this->access_secret = $this->ci->config->item('access_secret');
    }

    /**
     * This function fetches the twitter list and evaluates their sentiment
     * @param array $twitterSearchParams The Twitter Search Parameters that are passed to Twitter API. Read more here https://dev.twitter.com/docs/api/1.1/get/search/tweets
     * @return array
     */
    public function sentimentAnalysis($twitterSearchParams) {
    // public function SentimentAnalysis($tweetsList) {
        $tweetsList=$this->getTweets($twitterSearchParams);
        return $this->findSentiment($tweetsList);
    }

    /**
     * Calls the Search/tweets method of the Twitter API for particular Twitter Search Parameters and returns the list of tweets that match the search criteria.
     * @param mixed $twitterSearchParams The Twitter Search Parameters that are passed to Twitter API. Read more here https://dev.twitter.com/docs/api/1.1/get/search/tweets
     * @return array $tweets
     */
    function getTweets($twitterSearchParams) {
        $Client = new TwitterApiClient(); //Use the TwitterAPIClient
        $Client->set_oauth($this->consumer_key, $this->consumer_secret, $this->access_key, $this->access_secret);

        $tweets = $Client->call('search/tweets', $twitterSearchParams, 'GET'); //call the service and get the list of tweets

        unset($Client);

        return $tweets;
    }

    // Function find social analysis
    public function findSentiment($tweetsList) {

        // Initialize result array
        $results = array();

        // For each
        //for($i=0; $i < sizeof($tweetsList); $i++){
        foreach ($tweetsList as $tweet) {
            // Call Datumbox service to get the sentiment
            $sentiment = $this->ci->datumboxapi->SentimentAnalysis($tweet->Text);
            $topics = $this->ci->datumboxapi->TopicClassification($tweet->Text);
            if ($sentiment != false) {
                // Add the tweet Sentiment and ID in the results
                $results[] = array(//add the tweet message in the results
                    'ID' => $tweet->ID,
                    'Sentiment' => $sentiment,
                    'Topics' => $topics
                );
            }
        }

        unset($tweetsList);
        unset($this->ci->datumboxapi);

        return $results;
    }

}
