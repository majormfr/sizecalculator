<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Side Bar') }}</div>
        <div class="card-body">
            <li>
                <a href="{{ route('attributes.home') }}"> {{ __('Dashboard') }} </a>
            </li>
         

            <li>
                <a href="{{ route('sizes.create') }}"> {{ __('Add Sizes') }} </a>
            </li>
              <li>
                <a href="{{ route('sizes.home') }}"> {{ __('Sizes List') }} </a>
            </li>
        {{-- <li>
                <a href=""> {{ __('Attribute List') }} </a>
            </li> --}}
        </div>
    </div>
</div>
