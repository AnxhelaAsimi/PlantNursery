 <style type="text/css">
     .side-icon{
        display: inline-block;
        min-width: 1.5rem;
        padding-bottom: 0.125em;
        font-size: 1.1rem;
        line-height: 1.40625rem;
        vertical-align: middle;
        color: #505d69;
        -webkit-transition: all .4s;
        transition: all .4s;
        opacity: .75;
        width:  1.5rem;
     }
 </style>
 <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ route('dashboard') }}" class="waves-effect">
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Suppliers</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('supplier.all') }}">All Supplier</a></li>

                                </ul>
                            </li>
                
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <x-polaris-major-customers class="side-icon" />
                                    <span>Manage Customers</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('customer.all') }}">All Customers</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Units</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('unit.all') }}">All Unit</a></li>

                                </ul>
                            </li>
                         
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Category</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('category.all') }}">All Category</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>Manage Product</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('product.all') }}">All Product</a></li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>