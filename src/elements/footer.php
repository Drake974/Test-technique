<footer>
    <div class="d-flex justify-content-center bg-dark fixed-bottom">
        <span class="text-white">Copyright Centre culturel</span>
    </div>
</footer>

<!-- script bootstrap -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>
    
    <?php if(isset($_SESSION['flash'])):?>
<script>    
    var toast = new bootstrap.Toast(document.getElementById('liveToast'))
    toast.show();
    <?php unset($_SESSION['flash']);?>
</script>
<?php endif; ?>

    </body>
</html>