        <div id="aside" class="page-sidenav no-shrink bg-light nav-dropdown fade" aria-hidden="true">
            <div class="sidenav h-100 modal-dialog bg-light">
                <!-- sidenav top -->


               
                                            
                                            <!-- Flex nav content -->
                                            <div class="flex scrollable hover">
                                                <div class="pt-2">
                                                    <div class="nav-fold px-2">
                                                        <a class="d-flex p-2" data-toggle="dropdown">
                                                            <span class="avatar w-40 rounded hide">J</span>
                                                            <img src="{{url('')}}/{{$user->photo}}" alt="..." class="w-40 r">
                                                        </a>
                                                        <div class="hidden-folded flex p-2">
                                                            <div class="d-flex">
                                                                <a href="#" class="mr-auto text-nowrap">
                                                                    <small>{{$user->nama}}</small>
                                                                    <small class="d-block text-muted"></small>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nav-active-text-primary auto-nav" data-nav="">
                                                    <ul class="nav">
                                                        <li class="nav-header">
                                                            <span class="text-muted">Main</span>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{ route('user.data.index',['user' => $user->id]) }}">
                                                                <span class="nav-icon text-primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
                                                               
                                                          
                                                                <span class="nav-text">Home</span>
                                                            </a>
                                                        </li>
                                                        <li class="nav-header">
                                                            <span class="text-muted">Applications</span>
                                                        </li>
                                                        
                                                        <li class="">
                                                            <a href="{{ route('user.data.show',['user' => $user->id]) }}">
                                                                <span class="nav-icon text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" data-feather="user" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                                                                <span class="nav-text ">Profile</span>
                                                            </a>
                                                        </li>
        
                                                        <li>
                                                            <a href="{{ route('user.data.edit',['user' => $user->id]) }}">
                                                                <span class="nav-icon text-warning"><svg xmlns="http://www.w3.org/2000/svg" data-feather="settings" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg></span>
                                                                <span class="nav-text ">Settings</span>
                                                            </a>
                                                        </li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- sidenav bottom -->
                                            <div class="py-2 mt-2 b-t no-shrink">
                                                <ul class="nav no-border">
                                                    <li>
                                                        <a href="{{ url('') }}/logout">
                                                            <span class="nav-icon text-danger">
						          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
						        </span>
                                                            <span class="nav-text text-danger">Logout</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

            </div>
        </div>
        <!-- ############ Aside END-->
        
