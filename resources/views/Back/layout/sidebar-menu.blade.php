          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

                  <ul class="nav side-menu">
                      <li><a href="{{ route('dashboard') }}"><i class="fas fa-menu"></i> Səadət Sarayı <span
                        class=""></span></a> </li>
                      <li><a href="{{ route('about.index') }}"><i class="fas fa-info"></i> {{ __("About") }} <span
                                  class=""></span></a>

                      </li>
                      <li><a href="{{ route('meta') }}"><i class="fas fa-hashtag"></i> {{ __("Meta tag") }} <span
                                  class=""></span></a>

                      </li>
                      <li><a><i class="fa fa-edit"></i> Hall <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{ route('hall.index') }}">{{ __("Hall") }} {{ __("Create") }}</a></li>
                              <li><a href="{{ route("hall") }}">{{ __('Inner Hall') }}</a></li>

                          </ul>
                      </li>
                      <li><a><i class="fas fa-calendar-check"></i> Event <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{ route("event.index") }}">Event</a></li>
                               <li><a href="{{ route("event") }}">{{ __('Inner Event') }}</a></li>
                          </ul>
                      </li>

                      <li><a href="{{ route("getReserv") }}"><i class="fas fa-rss"></i>Reservation <span class=""></span></a>
                      <li><a href="{{ route("newsletter") }}"><i class="fas fa-rss"></i> News Letters <span class=""></span></a>
                      <li><a href="{{ route("getcontact") }}"><i class="fas fa-rss"></i> Contacts <span class=""></span></a>

                      </li>
                      {{-- <li><a><i class="fas fa-history"></i> Our History <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{ route("event.index") }}">Event</a></li>
                               <li><a href="{{ route("event") }}">{{ __('Inner Event') }}</a></li>
                          </ul>
                      </li> --}}
                      {{-- <li><a><i class="fas fa-address-book"></i> Contact <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{ route("event.index") }}">Event</a></li>
                               <li><a href="{{ route("event") }}">{{ __('Inner Event') }}</a></li>
                          </ul>
                      </li> --}}

                      @can('admin_access')

                      <li><a href="{{ route('logs')}}"><i class="fas fa-file-signature"></i> Logs <span class=""></span></a>

                      </li>
                      <li><a href="{{ route("users.index") }}"><i class="fas fa-user-cog"></i> User Settings <span class=""></span></a>
                          {{-- <ul class="nav child_menu">
                              <li><a href="{{ route("users.index") }}">Event</a></li>
                               <li><a href="{{ route("users.index") }}">{{ __('User Sttings') }}</a></li>
                          </ul> --}}
                      </li>
                      <li><a href="{{ route('settings') }}"><i class="fas fa-tools"></i> Site Settings <span class=""></span></a>
                          {{-- <ul class="nav child_menu">
                              <li><a href="{{ route("users.index") }}">Event</a></li>
                               <li><a href="{{ route("users.index") }}">{{ __('User Sttings') }}</a></li>
                          </ul> --}}
                      </li>

                      @endcan

                  </ul>
              </div>

          </div>
          <!-- /sidebar menu -->




          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          <!-- /menu footer buttons -->
          </div>
          </div>

          <!-- top navigation -->
          <div class="top_nav">
              <div class="nav_menu">
                  <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <nav class="nav navbar-nav">
                      <ul class=" navbar-right">

                          <li class="nav-item dropdown open" style="padding-left: 15px;">
                              <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                                  data-toggle="dropdown" aria-expanded="false">
                                  {{ Auth::user()->name }}
                              </a>
                              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile.show') }}"> Profile</a>

                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                      <i class="fa fa-sign-out pull-right"></i> {{ __('Logout') }} </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <!-- /top navigation -->
