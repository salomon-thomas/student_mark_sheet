@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible {{($fixed_top==true)?'fixed-top':''}}" role="alert">
    <h3 class="alert-heading fs-4 my-2">Success</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p class="mb-0">{{$message}}!</p>
</div>
@endif

@if ($messages = Session::get('error'))
<div class=" alert alert-danger alert-dismissible {{($fixed_top==true)?'fixed-top':''}}" role="alert">
    <h3 class="alert-heading fs-4 my-2">Error</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @if(is_array($messages))
    <ul>
        @foreach($messages as $message)
        <li>
            <p class="mb-0">{{ $message }}</p>
        </li>
        @endforeach
    </ul>
    @else
    <p class="mb-0">{{ $messages }}</p>
    @endif

</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible {{($fixed_top==true)?'fixed-top':''}}" role="alert">
    <h3 class="alert-heading fs-4 my-2">Warning</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p class="mb-0">{{$message}}</p>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible {{($fixed_top==true)?'fixed-top':''}}" role="alert">
    <h3 class="alert-heading fs-4 my-2">Information</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p class="mb-0">{{$message}}</p>
</div>
@endif

@if ($errors->any())
<div class="alert alert-light alert-dismissible {{($fixed_top==true)?'fixed-top':''}}" role="alert">
    <h3 class="alert-heading fs-4 my-2">Error</h3>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @if(is_array($errors))
    <ul>
        @foreach($errors->all() as $message)
        <li>
            <p class="mb-0">{{ $message }}</p>
        </li>
        @endforeach
    </ul>
    @else
    <p class="mb-0">{{ $errors }}</p>
    @endif
</div>
@endif