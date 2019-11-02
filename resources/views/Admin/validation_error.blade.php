@if ($errors->any())
    <div class="show-error">
        <ul>   
            @foreach ($errors->all() as $error)
               <li>
                    <i class="fas fa-exclamation-triangle"></i>
                   {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>    
@endif