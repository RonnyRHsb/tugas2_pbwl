<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row ">
      <div class="col-md-4">
          <a class="btn btn-primary" href="<?php echo URLROOT ;?>/pelanggan"><i class="fa fa-backward"></i> Go Back</a>
      </div>
  </div>
        <div class="card mb-3 mt-2">
            <div class="card-body"><h2 class="card-text"><?php echo  $data['pelanggan']->pel_nama ;?></h2></div>
            <h4 class="card-body bg-light p-4 mb-2">
               SERI / METERAN :  <?php echo  $data['pelanggan']->pel_seri ;?> // <?php echo  $data['pelanggan']->pel_meteran ;?>
            </h4>
            <h5 class="card-body bg-warning p-4 mb-2">
                NIK : <?php echo  $data['pelanggan']->pel_ktp ;?>
            </h5>            
            <p class="card-title bg-light p-2 mb-3">
                Golongan : <?php echo  $data['pelanggan']->pel_id_gol ;?></br>
              </p>

            <p class="card-title bg-light p-2 mb-3">
                No Hp : <?php echo  $data['pelanggan']->pel_hp ;?></br>
              </p>
            <p class="card-title bg-light p-2 mb-3">                
                Alamat : <?php echo  $data['pelanggan']->pel_alamat ;?></br>
              </p>
              <p class="card-title bg-light p-2 mb-3">
                Aktif : <?php echo  $data['pelanggan']->pel_aktif ;?></br>
              </p>
              <p class="card-title bg-light p-2 mb-3">
                Terakhir DiUpated : <?php echo  $data['pelanggan']->updated_at ;?></br>
            </p>            
            <p class="card-title bg-light p-2 mb-3">
             Created By <?php echo $data['user']->user_nama ;?> on <?php echo  $data['pelanggan']->created_at ;?>
            </p>

            <?php if($data['pelanggan']->pel_id_user == $_SESSION['user_id']) : ?>
                <div class="row">
                    <div class="col">
                        <a href="<?php echo URLROOT ;?>/posts/edit/<?php echo $data['pelanggan']->pel_id ;?>" class="btn btn-success btn-block">Edit</a>
                    </div>
                    <div class="col">
                        <form class="" action="<?php echo URLROOT ;?>/posts/delete/<?php echo $data['pelanggan']->pel_id ;?>" method="post">
                            <input type="submit" class="btn btn-danger btn-block" value="Delete"> 
                        </form>
                    </div>
                </div>
            <?php endif ;?>
        </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>