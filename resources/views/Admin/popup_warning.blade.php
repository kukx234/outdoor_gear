<div class="popup-warning">
    <h1>Upozorenje</h1>
    <p>Jeste li sigurni da želite izbrisati?</p>
    <div class="popup-btns">
        <a href="">Odustani</a>
        <button  class="btn-delete" >obrši2</a>
    </div>
</div>

<script>

    $(".delete").click(function() {
         $(this).parent().parent().addClass("removethis");
         $(".popup-warning").css("display","block");
    });

    function popupAlert(route , id){

      $(".btn-delete").click(function() {
          console.log("click");
          

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

                  setTimeout(function(){
                      $('.removethis').remove();
                  },800);
              }
          });

      });
    }

</script>
