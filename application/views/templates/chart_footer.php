<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Raadiputra <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <!-- chart js pie -->
    <script type="text/javascript">

      // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: [
              <?php if (count($candidate)>0) {
                foreach ($candidate as $v){
                  echo "'".$v['name']."',";
                }
              } ?>
            ],
            datasets: [{
              data: [
                <?php if (count($vote)>0) {
                foreach ($vote as $v){
                  echo $v['voting'].",";
                }
              } ?>
              ],
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: true,
              caretPadding: 10,
            },
            legend: {
              display: true
            },
            cutoutPercentage: 80,
          },
        });
    </script>

    <!-- datatables -->
    <!-- <script>
      $(document).ready(function() {
          $('#example').DataTable();
      } );
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script  src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> -->

    <script type="text/javascript">
      function change()
      {
        var x = document.getElementById('password').type;

        if (x == 'password')
        {
          document.getElementById('password').type = 'text';
          document.getElementById('mybutton').innerHTML;
        }
        else
        {
          document.getElementById('password').type = 'password';
          document.getElementById('mybutton').innerHTML;
        }
      }
    </script>

    <script>
      $('.custom-file-input').on('change', function(){
        let fileName=$(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
      
      $('.form-check-input').on('click', function() {
        const menuId=$(this).data('menu');
        const roleId=$(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeaccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function(){
            document.location.href="<?= base_url('admin/roleaccess/'); ?>"+roleId;
          }
        });

      });

      $('#check-submenu').on('click', function() {
        const submenu=$(this).data('submenu');            
        var tangkap;
        if ($('#check-submenu').is(":checked"))
      {
        tangkap = '1';
      }else{
          tangkap = '0';
      }

      console.log(submenu)
      console.log(tangkap)

        $.ajax({
          url: "<?= base_url('menu/changeactive'); ?>",
          type: 'post',
          data: {
          submenu: submenu,
            tangkap: tangkap
          },
          success: function(){
            // document.location.href="<?= base_url('menu/submenu'); ?>";
          }
        });

      });
    </script>

</body>

</html>