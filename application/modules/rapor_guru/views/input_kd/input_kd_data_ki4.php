 <div class="card-header">
     <h3 class="card-title"><b>KI-4 KETERAMPILAN</b></h3>
 </div>
 <table class="table table-striped">
     <thead>
         <tr>
             <th></th>
             <th class="text-center">#</th>
             <th>No.KD</th>
             <th>Deskripsi.KD</th>
         </tr>
     </thead>
     <tbody>
         <?php $no = 1 ?>
         <?php foreach ($kd as $k) :
                if ($k['jenis'] == 'K') { ?>
                 <tr>
                     <td><input type="hidden" name="jenis" value="K"></td>
                     <td class="text-center"><?= $no++ ?> </td>
                     <td>
                         <div class="form-check">
                             <div class="icheck-primary">
                                 <label class="form-check1-label">
                                     <input class="form-check-input" type="checkbox" name="no_kd[]" value="<?= $k['no_kd'] ?>" id="check1">
                                     <span class="form-check1-label">
                                         <span class="check1"></span>
                                     </span>
                                 </label>
                             </div>
                             <?= $k['no_kd'] ?>
                         </div>
                     </td>
                     <td>
                         <div class="form-check">
                             <div class="icheck-primary">
                                 <label class="form-check1-label">
                                     <input class="form-check-input" type="checkbox" name="nama_kd[]" value="<?= $k['deskripsi'] ?>" id="check1">
                                     <span class="form-check1-label">
                                         <span class="check1"></span>
                                     </span>
                                 </label>
                             </div>
                             <?= $k['deskripsi'] ?>
                         </div>
                     </td>
                 </tr>
         <?php }
            endforeach ?>
     </tbody>
 </table>
 <div class="modal-footer justify-content-between">
     <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
     <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
 </div>