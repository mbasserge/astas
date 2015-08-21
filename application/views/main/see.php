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
                    <b>Nb: </b> <?= $size; ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="col-lg-12">
                            <?php if (isset($tweets)) : foreach ($tweets as $row) : ?>
                                    <form role="form">

                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">ID</label>
                                            <input type="text" class="form-control" id="ID" value="<?php echo $row->ID; ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">User Name</label>
                                            <input type="text" class="form-control" id="UserName" value="<?= $row->UserName; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Local Time Stamp</label>
                                            <input type="text" class="form-control" id="LocalTimeStamp" value="<?= $row->LocalTimeStamp; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Text</label>
                                            <textarea class="form-control" id="Text"  ><?= $row->Text; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Language</label>
                                            <input type="text" class="form-control" id="Language" value="<?= $row->Language; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Source</label>
                                            <textarea type="text" class="form-control" id="Source" ><?= $row->Source; ?>" </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Location</label>
                                            <input type="text" class="form-control" id="Location" value="<?= $row->Location; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Hashtags</label>
                                            <input type="text" class="form-control" id="Hashtags" value="<?= $row->Hashtags; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Urls</label>
                                            <textarea type="text" class="form-control" id="Urls" ><?= $row->Urls; ?>" </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">User Mentions</label>
                                            <input type="text" class="form-control" id="UserMentions" value="<?= $row->UserMentions; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Follower Count</label>
                                            <input type="text" class="form-control" id="FollowerCount" value="<?= $row->FollowerCount; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Name</label>
                                            <input type="text" class="form-control" id="Name" value="<?= $row->Name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputSuccess">Sentiment</label>
                                            <input type="text" class="form-control" id="Sentiment" value="<?= $row->Sentiment; ?>">
                                        </div>

                                    </form>

                                <?php endforeach; ?>  
                            <?php else : ?>	
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
