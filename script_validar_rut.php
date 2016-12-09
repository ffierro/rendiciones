<script type="text/javascript">
    $(document).ready(function(){
        // Rutina para validar RUT Chileno
        $('#validar_rut').Rut({
          on_error: function(){ 
            alert('Rut Incorrecto'); 
            location.reload();},
          format_on: 'keyup'
        });
    });
</script>