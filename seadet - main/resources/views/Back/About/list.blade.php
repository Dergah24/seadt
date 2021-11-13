@extends("Back.layout.master")
@section('breadcrumb',__('About'))

@section('title',__('Seadet sarayı Admin panel'))
@section('content')
<div class="">
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">

            <div class="row" id="event_content">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="card events_basic">
                        <div class="card-header">
                            @can('admin_access')
                            <div class="events_icon ">
                                <i class="fas fa-pencil-alt fa-2x float-right" style="color: red;" width="100px" data-toggle="modal" data-target="#edit_about"></i>
                            </div>
                            @endcan
                        </div>
                        <div class="card-body">


                            <img class="card-img-top photo_events"
                                src="{{ asset('abouts') }}/{{$about->image}}"
                                alt="About Images">
                            <p class="hall_writing"></p>
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </div>
                        <div class="card-footer">
                             <label for="Banner Image" class="font-weight-bold text-dark">
                                        Banner Image
                              </label>
                        </div>
                    </div>
                </div>
            </div>
            </label>
            <br>
            <div class="x_content">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    @foreach (config('app.available_locales') as $locale=>$value )
                    <li class="nav-item">
                        <a class="nav-link @if($locale == 'az') active @endif" id="{{$locale}}-tab" data-toggle="tab"
                            href="#{{ $locale }}" role="tab" aria-controls="{{ $locale }}"
                            aria-selected="true">{{ $value }}</a>
                    </li>
                    @endforeach
                </ul>
                <form action="{{ route('about.update',$about->id) }}" method="Post">
                      @method('Put')
                      @csrf
                    <div class="tab-content" id="myTabContent">
                        @foreach (config('app.available_locales') as $locale=>$value)
                        <div class="tab-pane fade show  @if($locale == 'az') active @endif" id="{{ $locale }}"
                            role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="{{ __("Title_".$locale) }}" class="font-weight-bold text-dark">
                                        {{ __("Title") }} {{ $locale }}
                                    </label>
                                    <br>
                                    <span class="text-danger"></span>
                                    <input class="form-control" type="text" name="title_{{ $locale  }}"
                                        value="{{ $about->{'title_' . $locale} }}" id="example-text-input" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"
                                        class="font-weight-bold text-dark">{{ __("Content") }} {{ $locale }}</label>
                                    <br>
                                    <span class="text-danger"></span>
                                    <textarea class="form-control editor" id="editora{{ $locale }}" rows="3"
                                        style="height: 130px;" name="content_{{ $locale }}"
                                        required>{{ $about->{'content_' . $locale} }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div id="editor"></div>
                        @can('admin_access')
                        <button type="submit" class="btn btn-success float-right">{{ __("Save") }}</button>
                        @endcan
                    </form>
            </div>
        </div>
    </div>
</div>
</div>

@include('Back.About.edit')



<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection


