<div class="modal fade" id="edit_about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class=" col-md-12 mt-1">
                            <img id="icon" class="card-img-top photo_events"
                                src="{{ asset('abouts') }}/{{ $about->image }}" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="Banner Image" class="font-weight-bold text-dark">
                                    Banner Image
                                </label>
                                <input type="hidden" name="photo_" value="{{  $about->image }}">
                                <br>
                                <input type="file" name="image" class="form-control-file"  aria-describedby="fileHelp">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-12 mt-1">
                            @can('admin_access')
                            <button type="submit" class=" float-right btn btn-primary">{{__('Save')}}</button>
                            @endcan
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
