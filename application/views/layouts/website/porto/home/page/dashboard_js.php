<script>
    $(document).ready(function() {   
        let url = "<?php echo base_url('webpage'); ?>";
    });
    $(document).on("click","#btn_save_address_billing", (e) => {
        e.preventDefault();
        e.stopPropagation();
        
    });
    $(document).on("click","#btn_save_address_shipping", (e) => {
        e.preventDefault();
        e.stopPropagation();
        
    });    
    $(document).on("click","#btn_save_profile", (e) => {
        e.preventDefault();
        e.stopPropagation();
        console.log($(this));
        var id = $(this).attr('data-id');
        /* hint zz_ajax */
        
    });
    
    
</script>
