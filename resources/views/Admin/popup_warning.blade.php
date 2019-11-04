<div class="popup-warning">
    <h1>Upozorenje</h1>
    <p>Jeste li sigurni da želite izbrisati?</p>
    <div class="popup-btns">
        <a href="">Odustani</a>
        <a  class="btn-delete" href="">obrši2</a>
    </div>
</div>

<script>
    function popupAlert(route , id){
       $(".btn-delete").attr("href",route+"/"+id);
    }
</script>