<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Tweet_model extends CI_Model {
    
    /*
     * FUNCTION: Get All Tweets stored into DB
     */
    function getAllTweets() {
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Get Tweets by search term
     */
    function getTweetsByTerm($search) {
        //        
        $query = $this->db->query(" "
                . " SELECT * FROM tweets "
                . " WHERE Text LIKE '%$search%' "
                // . " AND Sentiment = 'none' LIMIT 50 "
                . "");        
        return $query->result();
        
    }
    // Get Nb Replies Tweets By Term
    function getNbRepliesByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.ID "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '@$search%' "
                . " AND tweets.UserName <> '$search' ");        
        return $query->result();
    }
    // Get Nb Retweets By Term
    function getNbRetweetsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT tweets.ID "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE 'RT @$search%' "
                . " AND tweets.UserName <> '$search' ");        
        return $query->result();
    }
    // Get Nb Mentions By Term
    function getNbMentionsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tOut.ID "
                . " FROM tweets tOut "
                . " WHERE tOut.Text LIKE '%$search%' "
                . " AND tOut.UserName <> '$search' "
                . " AND tOut.ID NOT IN "
                . "     ( SELECT tIn.ID "
                . "       FROM tweets tIn "
                . "       WHERE tIn.Text LIKE 'RT @$search%'"
                . "     )"
                . " ");        
        return $query->result();
    }  
    
    // Get Nb Positive Tweets By Term
    function getPositiveTweetsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.ID "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Sentiment = 'positive' ");        
        return $query->result();
    }
    // Get Nb Negatives Tweets By Term
    function getNegativeTweetsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.ID "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Sentiment = 'negative' ");        
        return $query->result();
    }
    // Get Nb Neutral Tweets By Term
    function getNeutralTweetsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.ID "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Sentiment = 'neutral' ");        
        return $query->result();
    }
    
    // Get Most Influencal Users By Term
    function getMostInfluentialUsersByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.UserName, tweets.Name, tweets.FollowerCount as Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.UserName <> '$search' "
                . " GROUP BY tweets.UserName "
                . " ORDER BY tweets.FollowerCount DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Influencal Users By Term
    function getMostActiveUsersByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.UserName, tweets.Name, COUNT(tweets.ID) as Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.UserName <> '$search' "
                . " GROUP BY tweets.UserName "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Influencal Hashtags By Term
    function getMostInfluentialHashtagsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.Hashtags, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Hashtags IS NOT NULL "
                . " GROUP BY tweets.Hashtags "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Influencal Hashtags By Term
    function getMostActiveTopicsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.Topics, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Topics IS NOT NULL "
                . " GROUP BY tweets.Topics "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Active Language By Term
    function getMostActiveLanguagesByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.Language, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Language IS NOT NULL "
                . " GROUP BY tweets.Language "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . "  ");        
        return $query->result();
    }
    
    // Get Most Active Location By Term
    function getMostActiveLocationsByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.Location, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Location IS NOT NULL "
                . " GROUP BY tweets.Location "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Active Location By Term
    function getMostActiveSourcesByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DISTINCT tweets.Source, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.Source IS NOT NULL "
                . " GROUP BY tweets.Source "
                . " ORDER BY COUNT(tweets.ID) DESC "
                . " LIMIT 5 ");        
        return $query->result();
    }
    
    // Get Most Active Location By Term
    function getVolumeTimeByTerm($search) {
        $query = $this->db->query(" "
                . " SELECT DATE(tweets.LocalTimeStamp) As yyyymmdd, COUNT(tweets.ID) AS Nb "
                . " FROM tweets "
                . " WHERE tweets.Text LIKE '%$search%' "
                . " AND tweets.LocalTimeStamp IS NOT NULL "
                . " GROUP BY DATE(tweets.LocalTimeStamp) "
                . " ORDER BY DATE(tweets.LocalTimeStamp) ASC "
                . "  ");        
        return $query->result();
    }

    /*
     * FUNCTION: Get Tweet By ID
     */

    function getTweetById($ID) {
        //
        $this->db->where('ID', $ID);
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Get All Positive Tweets stored into DB
     */

    function getAllPositiveTweets() {
        $this->db->where('Sentiment', 'positive');
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Get All Negative Tweets stored into DB
     */

    function getAllNegativeTweets() {
        $this->db->where('Sentiment', 'negative');
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Get All Negative Tweets stored into DB
     */

    function getAllNeutralTweets() {
        $this->db->where('Sentiment', 'neutral');
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Insert Tweet 
     */

    function insertTweet($data) {
        $result = $this->db->insert('tweets', $data);
        return $result;
    }

    /*
     * FUNCTION: Create Tweet from form
     */

    function createTweet() {
        $data = array(
            'ID' => $this->input->post('ID'),
            'USerName' => $this->input->post('UserName'),
            'Text' => $this->input->post('Text'),
            'Urls' => $this->input->post('Urls'),
            'Sentiment' => $this->input->post('Sentiment')
        );

        $result = $this->db->insert('tweets', $data);
        return $result;
    }

    /*
     * FUNCTION: Get Tweet
     */

    function getTweet($id) {
        $this->db->where('ID', $id);
        $query = $this->db->get('tweets');
        return $query->result();
    }

    /*
     * FUNCTION: Update Tweet 
     */

    function updateTweet($id) {
        // Get post data from form
        $data = array(
            'ID' => $this->input->post('ID'),
            'UserName' => $this->input->post('UserName'),
            'Text' => $this->input->post('Text'),
            'Urls' => $this->input->post('Urls'),
            'Sentiment' => $this->input->post('Sentiment')
        );

        // execvute query
        $this->db->where('ID', $data['ID']);
        $query = $this->db->update('tweets', $data);
        return $query->result();
    }

    /*
     * FUNCTION: Update Tweet 
     */

    function updateTweetSentiment($ID, $Sentiment, $Topics) {
        // Get post data from form
        $data = array(
            'Sentiment' => $Sentiment,
            'Topics' => $Topics
        );
        
        // execvute query
        /*$this->db->where('ID', $ID);
        $query = $this->db->update('tweets', array('Sentiment' => $Sentiment));*/
        
        $query = $this->db->update('tweets', $data, array('ID' => $ID));
    }

    /*
     * FUNCTION: Delete Tweet
     */

    function deleteTweet($id) {
        $this->db->where('ID', $this->input->get('ID'));
        $query = $this->db->delete('tweets');
        return $query->result();
    }

}
