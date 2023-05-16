 <style type="text/css">
     .side-icon {
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
         width: 1.5rem;
     }
 </style>
 <div class="vertical-menu">

     <div data-simplebar class="h-100">
         <div id="sidebar-menu">
             <!-- Left Menu Start -->
             <ul class="metismenu list-unstyled" id="side-menu">
                 <li class="menu-title">Menu</li>

                 <li>
                     <a href="{{ route('dashboard') }}" class="waves-effect">
                         <i class="ri-home-fill"></i>
                         <span>Dashboard</span>
                     </a>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-link"></i>
                         <span>Manage Suppliers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('supplier.all') }}">All Supplier</a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-shield-user-fill"></i>
                         <span>Manage Customers</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('customer.all') }}">All Customers</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-ruler-line"></i>
                         <span>Manage Units</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('unit.all') }}">All Unit</a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-apps-2-fill"></i>
                         <span>Manage Category</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('category.all') }}">All Category</a></li>

                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-plant-fill"></i>
                         <span>Manage Product</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('product.all') }}">All Product</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-file-list-3-line"></i>
                         <span>Manage Invoice</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('invoice.all') }}">All Invoice</a></li>
                         <li><a href="{{ route('invoice.pending.list') }}">Approval Invoice</a></li>
                         <li><a href="{{ route('print.invoice.list') }}">Print Invoice List</a></li>
                         <li><a href="{{ route('daily.invoice.report') }}">Daily Invoice Report</a></li>
                     </ul>
                 </li>
                 <li>
                     <a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="ri-money-dollar-box-fill"></i>
                         <span>Manage Purchase</span>
                     </a>
                     <ul class="sub-menu" aria-expanded="false">
                         <li><a href="{{ route('purchase.all') }}">All Purchase</a></li>
                         <li><a href="{{ route('purchase.pending') }}">Approval Purchase</a></li>
                         <li><a href="{{ route('daily.purchase.report') }}">Daily Purchase Report</a></li>
                     </ul>
                  </li>
                  <li class="menu-title">Stock</li>
                  <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-stock-fill"></i>
                            <span>Manage Stock</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('stock.report') }}">Stock Report</a></li>
                            <li><a href="{{ route('stock.supplier.wise') }}">Supplier / Product Wise </a></li>
                        </ul>
                   </li>
             </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
