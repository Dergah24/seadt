@extends("Back.layout.master")
@section('breadcrumb',__('Hall') )
@section('title',__('Seadet sarayı Admin panel'))
@section('link',route("hall.create"))
@section('content')
  <div class="row" id="event_content">
        @foreach ($response as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="card events_basic">
                    <div class="card-body">
                        @can('admin_access')
                        <div class="events_icon">
                            <a href="{{ route('hall.edit', $item->id) }}"> <i
                                    class="fas fa-edit fa-2x float-right blue mb-2"></i></a>
                           <a href="{{ route('hall-destroy', $item->id) }}"> <i
                                    class="fas fa-trash fa-2x  red mb-2"></i></a>
                        </div>
                        @endcan

                        <img data-id="{{ $item->id }}" class="fa-edit card-img-top photo_events"
                            src="{{ asset( $item->image) }}" alt=" Admin Panel-About us page">
                        <h3 class="hall_writing">{{ $item->{'title_' . app()->getLocale()} }}</h3>
                        <p class="hall_writing">{{ $item->{'content_' . app()->getLocale()} }}</p>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
