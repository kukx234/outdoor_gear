<div class="popup-main-div">
    <div class="popup-warning">
        <h1>Upozorenje</h1>
        <p>Jeste li sigurni da želite izbrisati?</p>
        <div class="popup-btns">
            <a href="">Odustani</a>
        </div>
    </div>
</div>


<script>

    $(".delete").click(function() {
        $(this).parent().parent().addClass("removethis");
        $(".popup-main-div").css("display","flex");
        var route = $(this).data('route');
        var id = $(this).data('id')
        $(".popup-btns").append("<button class='btn-delete' data-route="+route+" data-id="+id+">Obriši</button>");
    });

      $(document).on("click",".btn-delete",function() {
          var route = $(this).data("route");
          var id = $(this).data("id");
           
          $.ajax({
              type:"GET",
              url: route,
              data: { id: id},
              success:function(data){
                  if(data['success'] == "sub"){
                      var current = $(".subc").text() - 1;
                      $(".subc").text(current);
                  }else if (data['success'] == "prod"){
                    var current = $(".prodc").text() - 1;
                    $(".prodc").text(current);
                  }
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

</script>
