<h2 class="text-center">Gestion des ordinateurs</h2>
<!-- Button trigger modal -->
<div class="d-flex justify-content-center">
<button type="button" class="btn btn-primary mt-5 mb-5" data-bs-toggle="modal" data-bs-target="#computerModal">
Ajouter un ordinateur
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="computerModal" tabindex="-1" aria-labelledby="computerModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="computerModalLabel">Ajouter un nouveau ordinateur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p>Numéro du poste à rajouter</p>
      <form action="" method="POST">
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingComputer" placeholder="0000" required>
            <label for="floatingComputer">Numéro*</label>
        </div>
        <p>* Obligatoire</p>
        <div  class="text-center">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
        
     </form>
        
      </div>
      
    </div>
  </div>
</div>