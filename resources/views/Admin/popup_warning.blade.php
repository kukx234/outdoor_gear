<div class="popup-main-div">
    <div class="popup-warning">
        <h1>Upozorenje</h1>
        <p>Jeste li sigurni da želite izbrisati?</p>
        <div class="popup-btns">
            <a href="">Odustani</a>
            <button class="btn-delete" >Obriši</button>
        </div>
    </div>
</div>


<script>

    $(".delete").click(function() {
         $(this).parent().parent().addClass("removethis");
         $(".popup-main-div").css("display","flex");
    });

    function popupAlert(route , id){

      $(".btn-delete").click(function() {
    
          $.ajax({
              type:"GET",
              url: route,
              data: { id: id},
              success:function(data){
                  $(".removethis").animate({
                    margin:"0 300px",
                    opacity:"0",
                    height:"0",
                  },1000);

                  $(".popup-main-div").css("display","none");

                  setTimeout(function(){
                      $('.removethis').remove();
                  },800);
              }
          });

      });
    }

</script>
