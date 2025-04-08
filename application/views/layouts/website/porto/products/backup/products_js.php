<script>
    $(document).ready(function() {   
        let url = "<?= base_url(); ?>";
        $(document).on("click","#btn_load_more", function (e){
            e.preventDefault();
            e.stopPropagation();
            alert('btn_load_more');
        });
        
    });
</script>