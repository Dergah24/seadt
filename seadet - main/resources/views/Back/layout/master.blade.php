@include('Back.layout.header')
@include('Back.layout.sidebar-menu')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('currentBlade')</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>@yield('breadcrumb')</h2>
                    @can('admin_access')
                    @hasSection('link')
                       <a class="btn btn-success float-right" href='@yield("link")'>{{ __("Create") }}</a>
                     @endif
                     @endcan
                    <div class="clearfix"></div>

                  </div>
                  <div class="x_content">
                    @include('Back.layout.alerts')
                        @yield('content')
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@include('Back.layout.footer')


