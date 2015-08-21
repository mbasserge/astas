<div class="inner" style="min-height: 100% /*820px;*/ ;">
    <div class="row">
        <div class="col-lg-12">
            <h2><span style="color:blue;"><?= $title; ?></span></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p> <h3><b>Metrics for </b><?= $nbTweets; ?> <b>tweets </b> </h3></p> 
                    <hr/>
                    <p><b>For 1 tweet</b> you suppose to have <b>at least one</b> among of 1 @Replies, 1 RT @ or 1 Mention.  </p>    
                    <p> A <b>Very Good Engagement</b> is Greater or Equal Than <b>75%</b> (3/4)</p>
                    <p> An <b>Average Engagement</b> Greater or Equal Than <b>50%</b> (2/4)</p>
                    <p> A <b>Very Bad Engagement</b> is Lower or equal than <b>25%</b> (1/4)</p>
                    <hr/>
                    <p><span style="font-weight: bold; ">Sentiment = (Nb positives - Nb negative + Nb neutral)/(Nb of Tweets)</span></p>
                    <hr/>
                    <p><span style="font-weight: bold; ">Engagement = (Nb of Replies + Nb of Retweets Nb of Mentions)/(Nb of Tweets + Nb of Replies + Nb of Retweets Nb of Mentions)</span></p>

                </div>
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#sentiment" data-toggle="tab">Sentiment</a></li>
                        <li><a href="#engagement" data-toggle="tab">Engagement</a></li>                        
                        <li><a href="#mostactiveusers" data-toggle="tab">Active Users</a></li>
                        <li><a href="#mostinfluentialusers" data-toggle="tab">Influential Users</a></li>
                        <li><a href="#mostactivelanguages" data-toggle="tab">Active Languages</a></li>
                        <li><a href="#mostinfluentialhashtags" data-toggle="tab">Influential Hashtags</a></li>
                        <li><a href="#mostactivetopics" data-toggle="tab">Active Topics </a></li>
                        <li><a href="#mostactivelocations" data-toggle="tab">Active Locations</a></li>
                        <li><a href="#mostactivesources" data-toggle="tab">Active Sources</a></li>
                        <li><a href="#volumetime" data-toggle="tab">Volume-Time </a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">                        

                        <div class="tab-pane fade in active" id="sentiment">
                            <p>
                                <span style="font-weight: bold; font-size: large;">Sentiment = </span>  &nbsp; 
                                <span style="font-weight: bold; font-size: medium; color: green;"><?= round(($nbPositives * 100) / ($nbTweets), 2); ?> %Positive</span> &nbsp; | &nbsp;
                                <span style="font-weight: bold; font-size: medium; color: red;"><?= round(($nbNegatives * 100) / ($nbTweets), 2); ?> %Negative</span> &nbsp; | &nbsp;
                                <span style="font-weight: bold; font-size: medium; color: orange;"><?= round(($nbNeutrals * 100) / ($nbTweets), 2); ?> %Neutral</span> &nbsp; | &nbsp;
                                <span style="font-weight: bold; font-size: medium; color: grey;"><?= round(($nbTweets - $nbPositives - $nbNegatives - $nbNeutrals) * 100 / ($nbTweets), 2); ?> %None</span> &nbsp; | &nbsp;&nbsp;&nbsp;&nbsp;  
                                <b>Nb Positive: </b><?= $nbPositives; ?>  &nbsp; | &nbsp;&nbsp; 
                                <b>Nb Negative: </b><?= $nbNegatives; ?>  &nbsp; | &nbsp;&nbsp; 
                                <b>Nb Neutral: </b><?= $nbNeutrals; ?>
                            </p>
                        </div>

                        <div class="tab-pane fade" id="engagement">
                            <p>
                                <span style="font-weight: bold; font-size: large;">Engagement = </span> &nbsp;
                                <span style="font-weight: bold; font-size: larger; color: orangered;"><?= round(($nbReplies + $nbRetweets + $nbMentions) * 100 / ($nbTweets + ($nbReplies + $nbRetweets + $nbMentions)), 2); ?> %</span>&nbsp; | &nbsp;&nbsp; &nbsp;&nbsp;
                                <b>Nb Replies : </b><?= $nbReplies; ?>  &nbsp; | &nbsp;&nbsp; 
                                <b>Nb Retweets : </b><?= $nbRetweets; ?>  &nbsp; | &nbsp;&nbsp; 
                                <b>Nb Mentions : </b><?= $nbMentions; ?> 
                            </p>
                        </div>

                        <div class="tab-pane fade" id="mostactiveusers">
                            <p>
                                <span style="font-weight: bold; font-size: large;">Most Active Users:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostActiveUsers)) :
                                        foreach ($mostActiveUsers as $row) :
                                            ?>
                                            <?php echo $row->Name . ' (' . $row->Nb . ');    '; ?>  
                                        <?php endforeach; ?>  
                                    <?php else : echo 0 ?>	
                                    <?php endif; ?>
                                </span>
                            </p>
                        </div>

                        <div class="tab-pane fade" id="mostinfluentialusers">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Most Influential Users:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostInfluentialUsers)) :
                                        foreach ($mostInfluentialUsers as $row) :
                                            ?>
                                            <?php echo $row->Name . ' (' . $row->Nb . ');    '; ?>  
                                        <?php endforeach; ?>  
                                    <?php else : echo 0 ?>	
                                    <?php endif; ?>
                                </span>
                            </p> 
                        </div>

                        <div class="tab-pane fade" id="mostactivelanguages">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Most Active Languages:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostActiveLanguages)) :
                                        foreach ($mostActiveLanguages as $row) :
                                            ?>
                                            <?php echo $row->Language . ' (' . $row->Nb . ');    '; ?>  
                                        <?php endforeach; ?>  
                                    <?php else : echo 0 ?>	
                                    <?php endif; ?>
                                </span>
                            </p> 
                        </div>

                        <div class="tab-pane fade" id="mostinfluentialhashtags">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Most Influential Hashtags:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostInfluentialHashtags)) :
                                        foreach ($mostInfluentialHashtags as $row) :
                                            ?>
                                            <?php echo $row->Hashtags . ' (' . $row->Nb . ');    '; ?>  
                                        <?php endforeach; ?>  
                                    <?php else : echo 0 ?>	
                                    <?php endif; ?>
                                </span>
                            </p>
                        </div>

                        <div class="tab-pane fade" id="mostactivetopics">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Active Topics:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostActiveTopics)) :
                                        foreach ($mostActiveTopics as $row) : ?>
                                        <?php echo $row->Topics . ' (' . $row->Nb . ');    '; ?>  
                                    <?php endforeach; ?>  
                                <?php else : echo 0 ?>	
                                <?php endif; ?>
                                </span>
                            </p>
                        </div>
                        
                        
                        <div class="tab-pane fade" id="mostactivelocations">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Active Locations:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostActiveLocations)) :
                                        foreach ($mostActiveLocations as $row) : ?>
                                        <?php echo $row->Location . ' (' . $row->Nb . ');    '; ?>  
                                    <?php endforeach; ?>  
                                <?php else : echo 0 ?>	
                                <?php endif; ?>
                                </span>
                            </p>

                        </div>

                        <div class="tab-pane fade" id="mostactivesources">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Active Sources:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($mostActiveSources)) :
                                        foreach ($mostActiveSources as $row) : ?>
                                        <?php echo $row->Source . ' (' . $row->Nb . ');    '; ?>  
                                    <?php endforeach; ?>  
                                <?php else : echo 0 ?>	
                                <?php endif; ?>
                                </span>
                            </p>

                        </div>

                        <div class="tab-pane fade" id="volumetime">
                            <p>
                                <span style="font-weight: bold; font-size: medium;">Volume-Time:</span>
                                <span style="font-size: medium;">    
                                    <?php if (isset($volumeTime)) :
                                        foreach ($volumeTime as $row) : ?>
                                            <?php echo $row->yyyymmdd . ' (' . $row->Nb . ');    '; ?>  
                                        <?php endforeach; ?>  
                                    <?php else : echo 0 ?>	
                                    <?php endif; ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.row -->
                
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><b>List of </b><?= $nbTweets; ?> <b>tweets </b></h3>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>                                    
                                        <th>Text</th>
                                        <th>UserName</th>
                                        <th>#Hashtag</th>
                                        <th>Mention</th>
                                        <th>Sentiment</th>
                                        <th>Sentiment Lexical</th>
                                        <th>Topics</th>
                                        <!--th>CREATION DATE</th-->
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (isset($allTweets)) : foreach ($allTweets as $row) : ?>
                                        <tr class="odd gradeX <?php
                                            if ($row->Sentiment == 'positive') {
                                                echo 'success';
                                            } else if ($row->Sentiment == 'negative') {
                                                echo 'danger';
                                            } else if ($row->Sentiment == 'neutral') {
                                                echo 'info';
                                            }
                                            ?> " >
                                            <td><a href="<?= base_url(); ?>main/see/<?php echo $row->ID; ?>" target="_self"><?php echo $row->Text; ?></a></td>
                                            <td><?php echo $row->UserName; ?></td>                                        
                                            <td><?php echo $row->Hashtags; ?></td>
                                            <td><?php echo $row->UserMentions; ?></td>
                                            <td><?php echo $row->Sentiment; ?></td>
                                            <td><?php echo $row->SentimentLexical; ?></td>
                                            <td><?php echo $row->Topics; ?></td>
                                            <!--td><?php /* echo $row->dateCreated; */ ?></td-->
                                        </tr>
                                        <?php endforeach; ?>  
                                    <?php else : ?>	
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</div>
