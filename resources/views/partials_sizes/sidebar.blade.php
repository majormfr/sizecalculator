<div class="col-md-3">
    <div class="card">
        <div class="card-header p-3">{{ __('Side Bar') }}</div>
        <div class="card-body">
            <li class="sidebar_icon"  style="list-style-type: none !important;">
                 <a  href="{{ route('attributes.home') }}" class="btn-sidebar">   {{ __('Dashboard') }} </a>
            </li>


            {{-- <li  style="list-style-type: none !important;">
                <a href="{{ route('sizes.create') }}" class="btn-sidebar"> {{ __('Add Sizes') }} </a>
            </li>
              <li style="list-style-type: none !important;">
                    <a href="{{ route('sizes.home') }}" class="btn-sidebar"> {{ __('Sizes List') }} </a>
            </li> --}}
{{--            <li style="list-style-type: none !important;">--}}
{{--                <a href="{{ route('attributes.products') }}" class="btn-sidebar"> {{ __('Products') }} </a>--}}
{{--            </li>--}}
            <li style="list-style-type: none !important;">
                <a href="{{ route('attributes.tags') }}" class="btn-sidebar"> {{ __('Tags') }} </a>
            </li>
        {{-- <li>
                <a href=""> {{ __('Attribute List') }} </a>
            </li> --}}
        </div>
    </div>
</div>
