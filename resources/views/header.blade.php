<?php 
    use App\Http\Controllers\MainController; 
    $head_categories = MainController::colonaPosition(1);
?>
<div class="small-menu">
    <i class="fas fa-ellipsis-v"></i>
</div>
<section class="sec-navbar-section">
    <div class="sec-nav-cont">
        <a href="{{ asset("/") }}"><img  class="nav-logo" src="{{ asset('images/somrerologo.png') }}" alt=""></a>
        <div class="navbar-k">
            @foreach ($head_categories as $cat)
                @if (count($cat->subCategory) > 0)
                    <div class="hasSub">
                        {{ $cat->title }}
                        <i class="fas fa-angle-down"></i>
                        <div class="subnavbar">
                            @foreach ($cat->subCategory as $subcategory)
                                <a href="{{ route('productsList') }}">{{ $subcategory->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ route('productsList', $cat->id) }}">
                        {{ $cat->title }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</section>
