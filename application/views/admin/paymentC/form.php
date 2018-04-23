 <div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/paymentC') => 'Quản lý phương thức thanh toán', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-12">Tên <span class="required">*</span></label>
                    <div class="col-md-12">
                        <input required type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name : ''?>" name="Payment[name]">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Nội Dung</label>
                    <div class="col-md-12">
                        <textarea required class="form-control" name="Payment[content]" id="editor-full" rows="10" cols="80"><?php echo (isset($model)) ? $model->content : ''?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                <a href="<?php echo base_url('admin/paymentC')?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
 <script>
     // Replace the <textarea id="editor1"> with a CKEditor
     // instance, using default configuration.
     CKEDITOR.replace( 'editor-full', {
         filebrowserBrowseUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/ckfinder.html')?>",
         filebrowserUploadUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/core/connector/php/connector.php').'?command=QuickUpload&type=Files' ?>",
         filebrowserWindowWidth: '1000',
         filebrowserWindowHeight: '700'
     } );

     $(document).ready(function() {
         var drEvent = $('.dropify').dropify();
         drEvent.on('dropify.beforeClear', function(event, element){
            if(confirm("Bạn có chắc chắn muốn xóa hình này ?")) {
                $('#rm-img').prop('checked', true);
                return true;
            }
            return false;
         });
     });
 </script>