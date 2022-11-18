<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = New Applicants();
	  $applicant = $appl->single_applicant($_SESSION['APPLICANTID']); 
  ?>


<style type="text/css">
    .mailbox-controls .btn {
      padding: 3px 8px;
      margin: 0px 2px;
    }
</style>
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
    
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Notification</h3>

            
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
         
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    <?php 
                          $result=$applicant->SKILLSET;
                    
                         $sql = "SELECT DISTINCT * FROM `tbljob` j, `tblcompany`c,`tblapplicants` a WHERE j.`COMPANYID`=c.`COMPANYID` AND j.`CATEGORY`='$result'";
                        
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultList();
                        foreach ($cur as $result) {
                          # code...
                          echo '<tr>'; 
                          echo '<td class="mailbox-name"><a href="'.web_root.'index.php?q=viewjob&search='.$result->JOBID.'">'.$result->OCCUPATIONTITLE.'</a></td>';
                          echo '<td class="mailbox-subject">'.$result->JOBDESCRIPTION.'</td>'; 
                          echo '<td class="mailbox-date">'.$result->QUALIFICATION_WORKEXPERIENCE.'</td>';
                          echo '<td class="mailbox-date">'.$result->DATEPOSTED.'</td>';
                          echo '</tr>';
                        }
                    ?> 
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
     
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>