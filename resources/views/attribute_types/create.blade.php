@extends('shopify-app::layouts.default')
@section('content')
@include('partials_attributes.style')
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>

<div class="row mt-5 offset-3 ml-5 " style="10px !important">
    @include('partials_attributes.sidebar')
    <div class="col-md-9">  
<div class="card  w-75">
    <div class="card-header">@include('snippets.buttonback'){{ __('Add Attribute Type') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('attributesTypes.add') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{($attrOfProduct[0]['product']['product_id'])??$product_id }}">
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Attribute Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribute_name" type="text"
                           class="form-control @error('attribute_name') is-invalid @enderror" name="attribute_name"
                            required autocomplete="off"
                           >

                    @error('attribute_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- delete later --}}
            <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-4 col-form-label text-md-right">{{ __('size one') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribut_size" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-4 col-form-label text-md-right">{{ __('size two') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribut_size" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div> <div class="form-group row">
                <label for="attribut_size"
                       class="col-md-4 col-form-label text-md-right">{{ __('size three') }}</label>

                <div class="col-md-6">
                    <input tabindex="1" id="attribut_size" type="number"
                           class="form-control @error('attribut_size') is-invalid @enderror" name="attribut_size[]"
                            required min="1" autocomplete="off"
                           >

                    @error('attribut_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- delte later --}}
            
            
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                <div class="col-md-6">
                    <input tabindex="2" id="product_name" type="text"
                           class="form-control @error('product_name') is-invalid @enderror" value="{{$attrOfProduct[0]['name']}}"
                            required autocomplete="off" readonly disabled
                           >

                    @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
           
            <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>


                <div class="col-md-6">
                    
                        <div class="form-check">
                            <input class="form-control-file @error('thumb')'is-invalid' @enderror" type="file" name="thumb[]"
                                   id="thumb" multiple required >
                                   @error('thumb')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                   @enderror

                           
                        </div>



                    
                </div>

            </div>

            <div class="form-group row">
                <label for="Role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>


                <div class="col-md-6">
                    
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_required"
                                   id="is_required" >

                           
                        </div>



                    
                </div>

            </div>


           

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" >
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
 <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
            <div class="line-scale">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
<script>
       $("button[type = 'submit']").click(function(e){
               var $fileUpload = $("input[type='file']");
               if (parseInt($fileUpload.get(0).files.length) > 3){
                  alert("You are only allowed to upload a maximum of 3 files");
                  e.preventDefault();
               }
            });
    $(function(){
        $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(300).fadeOut("slow");
            }); 
         
    })
</script>
@endsection