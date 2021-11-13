<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{__("Update")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('edit_save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="" id="id">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control" name="event_id" id="hall_id">
                                <option value="">{{__("Choose")}}</option>
                                @foreach ($events as $item)
                                    <option value="{{ $item->id }}"> {{ $item->{'title_' . app()->getLocale()} }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class=" col-md-12 mt-1">
                            <img id="img" style="width:50%" class="card-img-top photo_events" src="" />

                        </div>
                        <div class="col-md-12 mt-1">
                            <div class="file-input add_file file-mt-10">
                                <input type="file" name="fileToUpload" id="file-input" class="file-input__input">
                                <label class="file-input__label add-file-1" for="file-input">{{__("Choose File")}}</label>
                            </div>
                        </div>
                    </div>
                </div>


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
                                        <input id="title_{{ $locale  }}" class="form-control" type="text" name="title_{{ $locale  }}"
                                            value="" id="example-text-input" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1"
                                            class="font-weight-bold text-dark">{{ __("Content") }} {{ $locale }}</label>
                                        <br>
                                        <span class="text-danger"></span>
                                        <textarea  class="form-control" id="content_{{ $locale }}" rows="3"
                                            style="height: 130px;" name="content_{{ $locale }}"
                                            required></textarea>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                    <button type="submit" class="btn btn-primary">{{__("Save")}}</button>
                </div>
            </form>

        </div>
    </div>
</div>


