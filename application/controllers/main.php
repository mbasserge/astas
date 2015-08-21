<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Roles Controller
 *
 * @author CASEMBA
 */
class Main extends CI_Controller {
    /*
     * CONSTRUCT FUNCTION 
     */

    public function __construct() {
        //
        parent::__construct();

        // Load tweet model
        $this->load->model('tweet_model');

        $this->load->library('sentimentanalysis');
        $this->load->library('datumboxapi');
        $this->load->library('twitterapiclient');

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Your own constructor code          
        // Test if user is authenticated
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && $is_logged_in == true) {
            // Load the session library
            $this->load->library('session');
        } else {
            redirect('login/index');
        }
    }

    /*
     * INDEX FUNCTION : Dashboard
     */
    public function index() {
        $size = 0;
        $data = array();

        if ($query = $this->tweet_model->getAllTweets()) {
            $data['allTweets'] = $query;
            $size = sizeof($query);
        }

        $data['title'] = 'Dashboard';
        $data['size'] = $size;
        $data['main_content'] = 'main/dashboard';
        $this->load->view('includes/template', $data);
    }

    /*
     * DASHBOARD FUNCTION 
     */

    public function dashboard() {
        // index
        $this->index();
    }

    /*
     * SA FUNCTION : Sentiment Analysis Search Page
     */
    public function sa() {

        $attributes = array(
            'id' => 'term',
            'name' => 'term',
            'value' => 'Enter A Search Term ...',
            'maxlength' => '100',
            'size' => '50',
            'style' => 'width:50%'
        );
        //

        $data['attributes'] = $attributes;

        $data['title'] = 'Sentiment Analysis Search Form';

        $data['main_content'] = 'main/sa';
        $this->load->view('includes/template', $data);
    }

    /*
     * VIEW FUNCTION 
     */

    public function view($search) {
        // Get Url parameter search term
        if ($search == null){
            $search = $this->uri->segment(3, 0);
        }
            
        $data = array();
        
        /* METRICS FOR ENGAGEMENT */
        // Get All tweets by term
        if ($query = $this->tweet_model->getTweetsByTerm($search)) {
            $data['allTweets'] = $query;
            // Metrics: Nb of tweets
            $data['nbTweets'] = sizeof($query);
        }             
        // Get Replies by term
        if ($query = $this->tweet_model->getNbRepliesByTerm($search)) {
            $data['allReplies'] = $query;
            // Metrics: Nb of Replies tweets
            $data['nbReplies'] = sizeof($query);
        }
        // Get Retweets by term
        if ($query = $this->tweet_model->getNbRetweetsByTerm($search)) {
            $data['nbRetweets'] = $query;
            // Metrics: Nb of Retweets
            $data['nbRetweets'] = sizeof($query);
        }    
        // Get Mentions by term
        if ($query = $this->tweet_model->getNbMentionsByTerm($search)) {
            $data['allMentions'] = $query;
            // Metrics: Nb of Mention tweets
            $data['nbMentions'] = sizeof($query);            
        }
        
        /* METRICS FOR SENTIMENT SCORE */
        // Get Mentions by term
        if ($query = $this->tweet_model->getPositiveTweetsByTerm($search)) {
            $data['allPositives'] = $query;
            // Metrics: Nb of Positive tweets
            $data['nbPositives'] = sizeof($query);            
        }        
        // Get Negative tweets by term
        if ($query = $this->tweet_model->getNegativeTweetsByTerm($search)) {
            $data['allNegatives'] = $query;
            // Metrics: Nb of Negative tweets
            $data['nbNegatives'] = sizeof($query);            
        }
        // Get Neutral tweets by term
        if ($query = $this->tweet_model->getNeutralTweetsByTerm($search)) {
            $data['allNeutrals'] = $query;
            // Metrics: Nb of Neutral tweets
            $data['nbNeutrals'] = sizeof($query);            
        } 
        
        /* OTHER METRICS */
        // Get Most Influencal Users By Term
        if ($query = $this->tweet_model->getMostInfluentialUsersByTerm($search)) {
            $data['mostInfluentialUsers'] = $query;
        }
        // Get Most Active Users By Term
        if ($query = $this->tweet_model->getMostActiveUsersByTerm($search)) {
            $data['mostActiveUsers'] = $query;
        }
        // Get Most Influential Hashtags By Term
        if ($query = $this->tweet_model->getMostInfluentialHashtagsByTerm($search)) {
            $data['mostInfluentialHashtags'] = $query;
        }
        // Get Most Active Language By Term
        if ($query = $this->tweet_model->getMostActiveLanguagesByTerm($search)) {
            $data['mostActiveLanguages'] = $query;
        }
        // Get Most Active Location By Term
        if ($query = $this->tweet_model->getMostActiveLocationsByTerm($search)) {
            $data['mostActiveLocations'] = $query;
        }
        // Get Most Active Source By Term
        if ($query = $this->tweet_model->getMostActiveSourcesByTerm($search)) {
            $data['mostActiveSources'] = $query;
        }
        
        // Get Most Active Topics By Term
        if ($query = $this->tweet_model->getMostActiveTopicsByTerm($search)) {
            $data['mostActiveTopics'] = $query;
        }        
        
        // Get Volume Time By Term
        if ($query = $this->tweet_model->getVolumeTimeByTerm($search)) {
            $data['volumeTime'] = $query;
        }
        
        
        //  Determine title by term
        if ($search == "chumontreal"){
            $data['title'] = "Centre Hospitalier de l'Universite de Montreal ";
        }elseif ($search == "ChuSteJustine"){
            $data['title'] = "Centre Hospitalier Ste Justine ";
        }elseif ($search == "HopitalChildren"){
            $data['title'] = "Montreal Hopital Children ";
        }else{
            $data['title'] = "Unknown";
        }
        $data['main_content'] = 'main/view';
        $this->load->view('includes/template', $data);
    }

    /*
     * VIEW FUNCTION 
     */

    public function see() {
        $ID = $this->uri->segment(3, 0);
        $size = 0;
        // Load tweet model
        $this->load->model('tweet_model');

        $data = array();

        if ($query = $this->tweet_model->getTweetById($ID)) {
            $data['tweets'] = $query;
            $size = sizeof($query);
        }

        $data['title'] = 'See Tweet Detail';
        $data['size'] = $size;
        $data['main_content'] = 'main/see';
        $this->load->view('includes/template', $data);
    }

    /*
     *  FUNCTION: Load
     *  DESCRIPTION: Load tweets, do sentiment analysis and store into db     * 
     */

    function load() {

        $this->form_validation->set_rules('searchterm', 'SearchTerm', 'callback_searchterm_check');

        if ($this->form_validation->run() == FALSE) {
            $this->sa();
        } else {
            // Get All Tweets with this searchterm
            $results = $this->sentimentanalysis->sentimentAnalysis($tweetsList);
            //$tweetsList = $this->tweet_model->getTweetsByTerm($this->input->post('searchterm'));
            // Get te result of SA
            //$results = $this->sentimentanalysis->SentimentAnalysis($tweetsList);
            // Update each tweet sentiment
            foreach ($results as $result) {
                $this->tweet_model->updateTweetSentiment($result['ID'], $result['Sentiment'], $result['Topics']);
            }

            $this->view($this->input->post('searchterm'));
        }
    }

    public function callback_searchterm_check($searchterm) {
        if (sizeof($searchterm) < 0) {
            $this->form_validation->set_message('searchterm_check', 'The %s field can not be the word empty');
            return FALSE;
        } else if ($searchterm != "chumontreal" && $searchterm != "ChuSteJustine" && $searchterm != "HopitalChildren") {
            $this->form_validation->set_message('searchterm_check', 'The %s field has to be chumontreal, ChuSteJustine or HopitalChildren');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     * ADD FUNCTION 
     */

    public function add($data) {
        // call add function
        $this->tweet_model->insertTweet($data);
    }

    /*
     * CREATE FUNCTION 
     */

    public function create() {
        // call update function
        $this->tweet_model->createTweet();
        // go back to view
        $this->index();
    }

    /*
     * UPDATE FUNCTION 
     */

    public function edit() {
        $id = $this->input->post('id');
        if (isset($id) && $id != "") {
            // call update function
            $this->tweet_model->updateTweet();
            // go back to view
            $this->view($this->input->post('id'));
        } else
            $this->index();
    }

    /*
     * DELETE FUNCTION 
     */

    public function delete($id) {
        // call delete function
        $this->tweet_model->deleteTweet($id);
        // go back to index
        $this->index();
    }

}
