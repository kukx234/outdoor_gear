<?php 
    use App\Http\Controllers\MainController; 
    $categories = MainController::colonaPosition(6);
?> 

<footer>

    <section class="last-sect">
        <div>
            <h3>Kontakt</h3>
            <p><i class="fas fa-map-marker-alt"></i>Brajšina 23, Rijeka</p>
            <p><i class="far fa-envelope"></i>kukx234@gmail.com</p>
            <p><i class="fas fa-phone-volume"></i>051 799 352</p>
        </div>

        <div class="buss-links">
            @foreach ($categories as $category)
                    <h3>{{$category->title}}</h3>
                    {{$category->title}} 
                    @foreach ($category->product as $product)
                        <div>
                            {{ $product->title }}
                        </div>
                    @endforeach
            @endforeach
        </div>

        <div>
            <h3>Pratite nas</h3>
        </div>
    </section>

</footer>