<div class="inner" style="min-height: /*100%*/820px; ;">
    <div class="row">
        <div class="col-lg-12">
            <h2><?= $title; ?></h2>
        </div>
    </div>

    <hr />

    <?php echo validation_errors(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Do Search </b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="col-lg-6">
                            <form method="post" action="<?=base_url(); ?>main/load">
                                <div class="form-group">
                                    <label>Search Term</label>
                                    <input class="form-control" id="searchterm" name="searchterm" value="">
                                    <p class="help-block">Enter your search term here.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Do Sentiment Analysis</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>
