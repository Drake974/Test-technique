<section>
<h2 class="text-center">Gestion des réservations</h2>
<div class="d-flex justify-content-center mb-4 mt-4">
  <form action="" method="post" id="dateChoose" class="text-center">
    <div class="form-floating mb-3">
      <input type="date" class="form-control form-date" id="floatingInput" placeholder="00/00/0000">
      <label for="floatingInput">Choisir votre date</label>
    </div>
    <select class="form-select form-date" aria-label="select">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
    
    
    <button type="submit" class="btn btn-primary" name="booking_choose">Voir</button>
    
  </form>
</div>
</section>


<section class="container">
<table class="table form-table table-striped">
  <thead>
    <tr>
      
      <th scope="col" class="text-center">Heure</th>
      
      <th colspan="4"  scope="col" class="text-center">Ajouter un utilisateur</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td scope="row" class="text-center">8h-9h</td>
      
      <td colspan="4" class="text-center"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
  Reserver
</button></td>
      
    </tr>

  </tbody>
</table>
</section>