<!-- Modal -->
<?php foreach($computers as $computer):?>
<div class="modal fade" id="<?= "deleteComputerModal_" . htmlspecialchars($computer->id_postes); ?>" tabindex="-1" aria-labelledby="deleteComputerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteComputerModalLabel">Supprimer un poste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Supprimer le poste N°: <?= htmlspecialchars($computer->numero_poste); ?></p>
      <form action="../models/deleteComputer.php" method="POST">
      <input type="hidden" value="<?= htmlspecialchars($computer->id_postes);?>" name="id_postes_delete">

        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-warning" name="delete_Computer" >Supprimer</button>
        </div>
        
     </form>
        
      </div>
      
    </div>
  </div>
</div>
<?php endforeach; ?>