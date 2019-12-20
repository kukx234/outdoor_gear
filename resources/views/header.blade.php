<?php 
    use App\Http\Controllers\MainController; 
    $head_categories = MainController::colonaPosition(1);
?>

@foreach ($head_categories as $cat)
    <div class="neka klasa">{{ $cat->title }}</div>
@endforeach

