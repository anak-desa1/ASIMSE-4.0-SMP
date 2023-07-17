 <h3 class="card-title">Rekap Nilai KI-1</h3>
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
         <?php foreach ($kelas as $t) : { ?>                
                 <tr>
                     <td><?= $i ?></td>
                     <td><?= $t['id_kelas'] ?></td>
                     <td>
                        <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_laporan/rekap_ki1_ki2/detail_ki1/<?= $t['rombel'] ?>">
                            <i class="fas fa-folder"></i>
                            <?= $t['rombel'] ?>                 
                        </a>                         
                     </td>
                 </tr>
                 <?php $i++; ?>
         <?php }
            endforeach; ?>
     </tbody>
 </table>