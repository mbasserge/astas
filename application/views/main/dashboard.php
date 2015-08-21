<div class="inner" style="min-height: /*100%*/820px; ;">
<div class="row">
        <div class="col-lg-12">
            <h2><?= $title; ?></h2>
        </div>
    </div>

    <hr />


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Data Set Size : </b><?= $size; ?> tweets
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>                                    
                                    <th>Text</th>
                                    <th>UserName</th>
                                    <th>#Hashtag</th>
                                    <th>Mention</th>
                                    <th>Sentiment</th>
                                    <!--th>CREATION DATE</th-->
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php if(isset($allTweets)) : foreach($allTweets as $row) : ?>
                                    <tr class="odd gradeX <?php if ( $row->Sentiment == 'positive' ){ echo 'success';}
										else if($row->Sentiment == 'negative' ){echo 'danger'; }
										else if($row->Sentiment == 'neutral' ){ echo 'info'; } ?> " >
                                        <td><a href="<?=base_url(); ?>main/see/<?php echo $row->ID; ?>" target="_self"><?php echo $row->Text; ?></a></td>
                                        <td><?php echo $row->UserName; ?></td>                                        
                                        <td><?php echo $row->Hashtags; ?></td>
                                        <td><?php echo $row->UserMentions; ?></td>
                                        <td><?php echo $row->Sentiment; ?></td>
                                        <!--td><?php /*echo $row->dateCreated;*/ ?></td-->
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
