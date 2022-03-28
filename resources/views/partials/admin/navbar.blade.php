<nav class="navbar navbar-expand-lg bg-primary">
              <div class="container">
                <div class="navbar-translate">
                  <a class="navbar-brand" href="#">{{ trans('panel.site_title') }}</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse" id="example-navbar-danger">
                  <ul class="navbar-nav ml-auto">
                 
                  @if (Auth::user())
                      @if (Auth::user()->roles()->pluck('id')->implode(', ') == 1)
                          <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/library_index') || request()->is('admin/library_index/*') ? 'active' : '' }}" href="/admin/library_index">
                              <p class="text-uppercase">Library</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/manage_client') || request()->is('admin/manage_client/*') ? 'active' : '' }}" href="/admin/manage_client">
                              <p class="text-uppercase">Manage Client</p>
                            </a>
                          </li>
                      @else
                        @if (Auth::user()->isActivate == true)
                          <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/client/questionnaire') || request()->is('admin/client/questionnaire/*') ? 'active' : '' }}" href="/admin/client/questionnaire">
                              <p class="text-uppercase">Questionnaire Form</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/client/legal_compliance_laws') || request()->is('admin/client/legal_compliance_laws/*') ? 'active' : '' }}" href="/admin/client/legal_compliance_laws">
                              <p class="text-uppercase">Legal Compliance Laws </p>
                            </a>
                          </li>
                        @endif
                      @endif

                  @else
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('login') || request()->is('login/*') ? 'active' : '' }}" href="/login">
                        <p>Login</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ request()->is('register') || request()->is('register/*') ? 'active' : '' }}" href="/register">
                        <p>Register</p>
                      </a>
                    </li>
                  @endif
                    
                    @if (Auth::user())
                      <li class="nav-item dropdown ml-4">
                        <a href="#" class="nav-link dropdown-toggle font-weight-bold" id="navbarDropdownMenuLink" data-toggle="dropdown">
                          @if (Auth::user()->roles()->pluck('id')->implode(', ') == 1)
                            {{Auth::user()->name ?? 'ADMIN'}}
                          @else
                            {{Auth::user()->client->name ?? Auth::user()->email}} 
                          @endif
                            
                          <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if (Auth::user()->roles()->pluck('id')->implode(', ') == 1)
                          <a class="dropdown-item" href="/admin/add_admin">ADD ADMIN</a>
                        @else
                          <a class="dropdown-item" href="/admin/client/account">Edit Account</a>
                        @endif
                          <a class="dropdown-item" href="/admin/change_password">Change Password?</a>
                          <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a>
                        </div>
                      </li>
                    @endif
                  </ul>
                </div>
              </div>
            </nav>