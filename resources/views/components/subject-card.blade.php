@props(['subject'])


<div class="col-xl-3 col-lg-3 col-sm-6">
    <div class="h4_category-item">
        <div class="h4_category-item-icon">
            <i class="fa-light fa-square-pen"></i>
        </div>
        <div class="h4_category-item-content">
            <h5><a
                    href="{{ route('view-subject-pasco', ['slug' => $subject->slug, 'id' => $subject->id]) }}">{{ $subject->name }}</a>
            </h5>
            @if ($subject->examType)
                <span style="color: red;">({{ $subject->examType->short_name }})</span>
            @endif
            <p>34k Question</p>
        </div>
    </div>
</div>
