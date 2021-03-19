<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Réservation d'un poste</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <P>Date</P>
        <P>Horaire</P>
        <P>Poste 1</P>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingAdd" placeholder="00000" required>
            <label for="floatingAdd">N° d'inscription*</label>
        </div>
        <p>* Obligatoire</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-warning" name="add_booking">Enregistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>