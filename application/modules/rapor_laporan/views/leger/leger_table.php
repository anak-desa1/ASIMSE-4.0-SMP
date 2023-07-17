 <!-- <h3 class="card-title">Catak Leger</h3> -->
 <table class="table table-striped projects">
     <thead>
         <tr>
             <th>
                 #
             </th>
             <th>
                 Kelas
             </th>
             <th>
                 Rombel
             </th>
         </tr>
     </thead>
     <tbody>
         <?php $i = 1; ?>
         <?php foreach ($kelas as $t) :{ ?>                
                 <tr>
                     <td><?= $i ?></td>
                     <td><?= $t['id_kelas'] ?></td>
                     <td>
                        <a target="_blank" class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_laporan/leger/detail/<?= $t['rombel'] ?>">
                            <i class="fas fa-folder"> </i>
                            <?= $t['rombel'] ?>
                        </a>
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
     </tbody>
 </table>