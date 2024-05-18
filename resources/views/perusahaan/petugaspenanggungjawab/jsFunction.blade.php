<script>
    $(document).on("input", ".hanyaangka", function(e) {
        this.value = this.value.replace(/[^0-9.,]/g, '');
        this.value = this.value.replace(/(\..*)\./g, '$1').replace(/(,.*)\,/g, '$1');
    });
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy', // atau format yang Anda inginkan
            autoclose: true
        });
    });
</script>
