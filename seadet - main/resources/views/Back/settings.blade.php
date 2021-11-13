@extends("Back.layout.master")
@section('breadcrumb',__('Site settings'))

@section('title',__('Seadet sarayı Admin panel'))
@section('content')
<div class="">
    <div class="col-md-12 col-sm-6  ">
        <div class="x_panel">
            </label>
            <br>
            <div class="x_content">

                <form action="{{ route('settingsUpdate',$settings->id) }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Ünvan
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="adress" value="{{ $settings->adress }}"
                                    id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Telefon (mobile)
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="phone" value="{{ $settings->phone }}"
                                    id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold text-dark">
                                    Telefon
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="telefon"
                                    value="{{ $settings->telefon }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Email
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="email" value="{{ $settings->email }}"
                                    id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Facebook
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="facebook"
                                    value="{{ $settings->facebook }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="font-weight-bold text-dark">
                                    İnstagram
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="instagram"
                                    value="{{ $settings->instagram }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Tüitter
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="twitter"
                                    value="{{ $settings->twitter }}" id="example-text-input">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aa" class="font-weight-bold text-dark">
                                    Yotube
                                </label>
                                <br>
                                <span class="text-danger"></span>
                                <input class="form-control" type="text" name="youtube"
                                    value="{{ $settings->youtube }}" id="example-text-input">
                            </div>
                        </div>
                    </div>

                    <button type="submit"
                        class="btn btn-success float-right mt-5">{{ __("Save") }}</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>




<script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>
@endsection
