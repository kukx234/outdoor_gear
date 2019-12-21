<?php 
    use App\Http\Controllers\MainController; 
    $head_categories = MainController::colonaPosition(1);
?>
<ul>
    @foreach ($head_categories as $cat)
        @if (count($cat->subCategory) > 0)
            <li>
                {{ $cat->title }}
                <ul>
                    @foreach ($cat->subCategory as $subcategory)
                        <li>{{ $subcategory->title }}</li>
                    @endforeach
                </ul>
            </li>
        @else
            <li>
                {{ $cat->title }}
            </li>
        @endif
    @endforeach
</ul>