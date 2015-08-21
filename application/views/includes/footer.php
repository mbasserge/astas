</div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  ASTAS &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->     
    
    <!-- GLOBAL SCRIPTS -->
    <script src="<?=base_url(); ?>/assets/plugins/jquery-2.0.3.min.js"></script>
    <script src="<?=base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="<?=base_url(); ?>/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?=base_url(); ?>/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?=base_url(); ?>/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script >
        $().ready(function () {
            $('#dataTables-example').dataTable({
                'aLengthMenu': [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ],
                'iDisplayLength': 25
            });
        });
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    
</body>
    <!-- END BODY-->
    
</html>
