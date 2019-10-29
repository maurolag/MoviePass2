<span id="alert" class="alert alert-danger alert-dismissible fade show"><?php if (isset($alertMessage)) echo $alertMessage ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</span>

<script>
    $(document).ready(function() {

          validateAlert("alert", <?php if (isset($alertMessage)) {
                    echo "'" . $alertMessage . "'";
               } else {
                    echo "''";
               } ?>)

    });
</script>


<style>

#alert {
          display: block;
          width: 80%;
          margin-top: 2%;
     }

</style>