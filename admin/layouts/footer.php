            <!-- /.content-wrapper -->
        </div>

        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Bạn có muốn đăng xuất?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" href="<?php echo base_url() ?>dang-xuat.php">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>public/admin/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>public/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url() ?>public/admin/vendor/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url() ?>public/admin/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>public/admin/js/sb-admin.min.js"></script>
        <!-- Demo scripts for this page-->
        <script src="<?php echo base_url() ?>public/admin/js/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url() ?>public/admin/js/demo/chart-area-demo.js"></script>
        <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
        <script type='text/javascript'>
        //<![CDATA[
        $(function(){
        $('html').append('<img id="halo" title="Happy Noel" style="cursor:pointer;position:fixed;z-index:99999" height="120" src="https://lh3.ggpht.com/-LSDhJFNSG-E/VnQh0rSGAHI/AAAAAAAADoo/3FdK8o-hZ6A/s1600/tuan_loc_cho_qua_cua_ong_gia_noel_anh.gif"/>')
        setInterval(function(){
        var $X=Math.ceil(Math.random()*$(window).width())
        var $Y=Math.ceil(Math.random()*$(window).height())
        $('img#halo').animate({'left':$X,'top':$Y},5000)
        },5000)
        $('img#halo').click(function(){
        window.open('https://lh3.ggpht.com/-LSDhJFNSG-E/VnQh0rSGAHI/AAAAAAAADoo/3FdK8o-hZ6A/s1600/tuan_loc_cho_qua_cua_ong_gia_noel_anh.gif','')
        })
        })
        //]]>
        </script>
    </body>
</html>