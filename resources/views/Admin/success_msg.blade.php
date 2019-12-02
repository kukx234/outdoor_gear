@if (Session::has('Success'))
<div class="success-p">
  <p>{{ Session::get('Success') }}</p>
</div>
@endif

<script>

  if($(".success-p").height()){
     setTimeout(function(){
          $(".success-p").remove();
      },5000);
  }

</script>

