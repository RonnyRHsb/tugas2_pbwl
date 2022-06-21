<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card bg-light mt-5">
            <div class="card-header card-text">
                <div class="row">
                    <div class="col">
                        <h2 class="card-text">Edit Pelanggan</h2>
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/posts" class="btn btn-light pull-right"><i class="fa fa-backward"></i> Back</a>
                    </div>
                    
                </div>
            </div>
        
            <div class="card-pel_alamat">
                <form method="post" action="<?php echo URLROOT ;?>/Posts/edit/<?php echo $data['id'] ;?>">
                    <div class="form-group">
                        <label for="pel_nama">Nama Pelanggan<sub>*</sub></label>
                        <input type="text" name="pel_nama" class="form-control form-control-lg <?php echo (!empty($data['pel_nama_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['pel_nama'] ;?>">
                        <span class="invalid-feedback"><?php echo $data['pel_nama_err'] ;?> </span>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat<sub>*</sub></label>
                        <textarea type="text" name="pel_alamat" class="form-control form-control-lg <?php echo (!empty($data['pel_alamat_err'])) ? 'is-invalid' : '' ;?>"><?php echo $data['pel_alamat'] ;?></textarea><span class="invalid-feedback"><?php echo $data['pel_nama_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK<sub>*</sub></label>
                        <input type="text" name="pel_ktp" class="form-control form-control-lg <?php echo (!empty($data['pel_ktp_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['pel_ktp'] ;?>"><span class="invalid-feedback"><?php echo $data['pel_ktp_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="pel_hp">HP<sub>*</sub></label>
                        <input type="text" name="pel_hp" class="form-control form-control-lg <?php echo (!empty($data['pel_hp_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['pel_hp'] ;?>"><span class="invalid-feedback"><?php echo $data['pel_hp_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="seri">SERI<sub>*</sub></label>
                        <input type="text" name="pel_seri" class="form-control form-control-lg <?php echo (!empty($data['pel_seri_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['pel_seri'] ;?>"><span class="invalid-feedback"><?php echo $data['pel_seri_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        <label for="meteran">METERAN<sub>*</sub></label>
                        <input type="text" name="pel_meteran" class="form-control form-control-lg <?php echo (!empty($data['pel_meteran_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['pel_meteran'] ;?>"><span class="invalid-feedback"><?php echo $data['pel_meteran_err'] ;?> </span>
                    </div>

                    <div class="form-group">
                        
                        <input type="hidden" name="updated_at" class="form-control form-control-lg" value="<?= date('Y-m-d h:i:s');?>" ><span class="invalid-feedback"><?php echo $data['pel_seri_err'] ;?> </span>
                    </div>                                        

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <input type="submit" class="btn btn-primary btn-block pull-left" value="Update Post">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>