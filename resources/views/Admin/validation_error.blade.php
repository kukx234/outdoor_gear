@if ($errors->any())
    <div class="show-error" id="test">
        <ul>
            @foreach ($errors->all() as $error)
               <li>
                    <i class="fas fa-exclamation-triangle"> {{ $error }}</i>
                   
                </li>
            @endforeach
        </ul>
    </div>
@endif

<script>

    if($(".show-error").height()){
       setTimeout(function(){
            $(".show-error").remove();
        },8000);
    }

</script>
