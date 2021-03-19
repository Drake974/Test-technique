<!-- Modal -->
<?php foreach($computers as $computer):?>
<div class="modal fade" id="<?= "editComputerModal_" . htmlspecialchars($computer->id_postes); ?>" tabindex="-1" aria-labelledby="editComputerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editComputerModalLabel">Modifier le poste N°:</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../models/editComputer.php" method="POST">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingComputerEdit" placeholder="00" required value="<?= htmlspecialchars($computer->numero_poste); ?>" name="edit_computer_number">
            <label for="floatingComputerEdit">Numéro*</label>
        </div>
        <input type="hidden" value="<?= htmlspecialchars($computer->id_postes);?>" name="id_postes">
        <p>* Obligatoire</p>
        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-warning">
        </div>
        
     </form>
        
      </div>
      
    </div>
  </div>
</div>
<?php endforeach; ?>