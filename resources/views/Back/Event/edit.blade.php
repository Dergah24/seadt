@extends("Back.layout.master")
@section('breadcrumb',__('Event') ." ". __('Update'))
@section('title',__('Seadet sarayı Admin panel'))
@section('content')
<div class="">
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">

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
                <form action="{{ route('event.update', $response->id) }}" method="Post" enctype="multipart/form-data">
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
                                        value="{{ $response->{'title_' . $locale} }}" id="example-text-input" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"
                                        class="font-weight-bold text-dark">{{ __("Content") }} {{ $locale }}</label>
                                    <br>
                                    <span class="text-danger"></span>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        style="height: 130px;" name="content_{{ $locale }}"
                                        required>{{ $response->{'content_' . $locale} }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="{{ __("Title_".$locale) }}" class="font-weight-bold text-dark">
                                        {{ __("Banner Image") }}
                                    </label>
                                    <br>
                                    <span class="text-danger"></span>
                                    <input class="form-control" type="file" name="image" id="example-text-input"
                                        >
                                </div>
                            </div>

                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                                <div class="card events_basic">
                                    <div class="card-body">

                                        <img data-id="{{ $response->id }}" class="fa-edit card-img-top photo_events"
                                            src="{{ asset( $response->image) }}" alt=" Admin Panel-About us page">

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                         <button type="submit"    class="btn btn-success float-right mt-5">{{ __("Save") }}</button>
                                

                </form>
            </div>
        </div>
    </div>
</div>
</div>

{{--  @include('Back.About.edit')  --}}

@endsection
