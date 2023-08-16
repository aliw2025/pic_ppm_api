 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ url('/resources/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">PPM</span>
     </a>
     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ url('/resources/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="{{route('admin-panel')}}"  class="d-block">Admin</a>
             </div>
         </div>
         
         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('index') }}" class="nav-link">
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <p>
                            Vendors
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vendors-list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendors</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>
                 <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <p>
                           Assets
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                      
                        <li class="nav-item">
                            <a href="{{route('assets-list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assets List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                 <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <p>
                            Work Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('workOrder.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>  Add Work Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  href="{{ route('workOrder.index') }}"  class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Work Order List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a  class="nav-link">
                        <p>
                            Service Category
                            
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('serviceCategory.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Deparment Wise</p>
                            </a>
                        </li>
                    
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <p>
                            SLA
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('define-sla') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Define SLA</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 {{-- <li class="nav-item">
                     <a href="{{ route('ppm-list') }}" class="nav-link">
                         <p>
                             Upcoming Maintainences
                         </p>
                     </a>
                 </li> --}}
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
