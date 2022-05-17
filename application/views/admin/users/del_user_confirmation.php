<?php $this->load->view('_partials/header');?>
<div class="wrapper">
    <?php $this->load->view('_partials/page_header');?>
    <?php $this->load->view('_partials/sidemenu');?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
           <?php $this->load->view('_partials/page_content_header');?>
           <?php $this->load->view('_partials/flashmessage');?>
            <!-- Main content -->
            <section class="content container-fluid">

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="box box-danger  box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Anda Yakin Akan menghapus data ini?</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php echo $row['first_name'].($row['last_name']? " ".$row['last_name']:'')." (".$row['email'].")";?>
                            </div>
                            <div class="box-footer">
                                <a href="<?php echo site_url('admin/users');?>" class="btn btn-default">Cancel</a>
                                <a href="<?php echo site_url('admin/users/del/'.$row['id']."/$confirm_id");?>" class="btn btn-primary pull-right">DELETE</a>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    <?php $this->load->view('_partials/page_footer');?>
</div>
<?php $this->load->view('_partials/footer');?>


