<h2 class="text-center">Gestion des utilisateurs</h2>
<!-- Button trigger modal -->
<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-warning mt-5 mb-5 form-date" data-bs-toggle="modal"
        data-bs-target="#userModal">
        Enregistrer un utilisateur
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Enregister un nouvelle utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../models/createUser.php" method="POST" id="modalAddUser">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingLastName" placeholder="Nom" required
                            name="last_name">
                        <label for="floatingLastName">Nom*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingFirstName" placeholder="Prénom" required
                            name="first_name">
                        <label for="floatingFirstName">Prénom*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingRegister" placeholder="00000" required
                            name="number">
                        <label for="floatingRegister">N° d'inscription*</label>
                    </div>
                    <p>* Obligatoire</p>
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning" name="register_user"
                            id="modalAddRegister">Enregistrer</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>