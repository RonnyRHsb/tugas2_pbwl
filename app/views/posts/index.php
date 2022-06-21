<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('pelanggan_message'); ?>
  <div class="row ">
      <div class="col-md-8">
          <h2>Data Pelanggan</h2>
      </div>
      <div class="col-md-4">
          <a class="btn btn-primary pull-right" href="<?php echo URLROOT ;?>/posts/add"><i class="fa fa-pencil"></i> Add Pelanggan</a>
      </div>
  </div>
  <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
        <div class="card mb-3 mt-2">
            <div class="card-body"><h2 class="card-text"><?php echo  $pelanggan->pel_nama ;?></h2></div>
            <h3 class="card-body bg-warning">
                Seri - Meteran : <?php echo  $pelanggan->pel_seri ;?> // <?php echo  $pelanggan->pel_meteran ;?>
            </h3>
            <p class="card-title bg-light p-2 mb-3">
             Created By <?php echo $pelanggan->user_nama ;?> on <?php echo  $pelanggan->created_at ;?>
            </p>
            <a href="<?php echo URLROOT ;?>/posts/show/<?php echo $pelanggan->pel_id ;?>" class="btn btn-success btn-block">More...</a>
        </div>
  <?php endforeach ;?>
<?php require APPROOT . '/views/inc/footer.php'; ?>