<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
       <div class="main-menu-content">
              <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

                     <li class="nav-item active"><a href="{{route('admin.dashboard')}}"><i
                                          class="la la-mouse-pointer"></i><span class="menu-title"
                                          data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
                     </li>

                     <!--
li.nav-item => open
ul li => active
-->

                    


<li class="nav-item  "><a href=""><i
                                          class="la la-group"></i>
                                   <span class="menu-title" data-i18n="nav.dash.main">المستخدمين </span>
                                   <span class="badge badge badge-success badge-pill float-right mr-2">{{\App\Models\User::count()}}
                                   </span>
                            </a>
                            <ul class="menu-content">
                                   <li ><a
                                                 class="menu-item" href=""
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                                   </li>
                            </ul>
                     </li>


                     <li >
                            <a href=""><i class="la la-male"></i>
                                   <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات </span>
                                   <span class="badge badge badge-danger  badge-pill float-right mr-2">0</span>
                            </a>
                            <ul class="menu-content">
                                   <li><a class="menu-item" href="" data-i18n="nav.dash.ecommerce"> ارسل رساله</a>
                                   </li>
                            </ul>
                     </li>


                     <li class="nav-item"  ><a href=""><i
                                          class="la la-group"></i>
                                   <span class="menu-title" data-i18n="nav.dash.main">الاقسام </span>
                                   <span class="badge badge badge-danger badge-pill float-right mr-2">
                                          {{\App\Models\Category::count()}} </span>
                            </a>
                            <ul class="menu-content">
                                   <li class=""><a
                                                 class="menu-item" href="{{route('admin.maincategories')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                                   </li>
                                   <li class=""><a
                                                 class="menu-item" href="{{route('admin.maincategories.create')}}"
                                                 data-i18n="nav.dash.crypto">أضافة
                                                 قسم جديد </a>
                                   </li>
                            </ul>
                     </li>
                     <li class="nav-item"  ><a href=""><i
                            class="la la-group"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">الماركات</span>
                     <span class="badge badge badge-danger badge-pill float-right mr-2">
                            {{\App\Models\Brand::count()}} </span>
              </a>
              <ul class="menu-content">
                     <li class=""><a
                                   class="menu-item" href="{{route('admin.brands')}}"
                                   data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                     </li>
                     <li class=""><a
                                   class="menu-item" href="{{route('admin.brands.create')}}"
                                   data-i18n="nav.dash.crypto">أضافة
                                   قسم جديد </a>
                     </li>
              </ul>
       </li>
       <li class="nav-item"  ><a href=""><i
              class="la la-group"></i>
       <span class="menu-title" data-i18n="nav.dash.main">العلامات</span>
       <span class="badge badge badge-danger badge-pill float-right mr-2">
              {{\App\Models\Tag::count()}} </span>
</a>
<ul class="menu-content">
       <li class=""><a
                     class="menu-item" href="{{route('admin.tags')}}"
                     data-i18n="nav.dash.ecommerce"> عرض الكل </a>
       </li>
       <li class=""><a
                     class="menu-item" href="{{route('admin.tags.create')}}"
                     data-i18n="nav.dash.crypto">أضافة
                     قسم جديد </a>
       </li>
</ul>
</li>


                     <li class="nav-item  "><a href=""><i class="la la-group"></i>
                                   <span class="menu-title" data-i18n="nav.dash.main">المنتجات </span>
                                   <span
                                          class="badge badge badge-danger badge-pill float-right mr-2"></span>
                            </a>
                            <ul class="menu-content">
                                   <li class=""><a class="menu-item" href="{{route('admin.products.general.index')}}"
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                                   </li>
                                   <li class=""><a class="menu-item" href="{{route('admin.products.general.create')}}"
                                                 data-i18n="nav.dash.crypto">أضافه
       منتج جديده</a>
                                   </li>
                            </ul>
                     </li>
                     <li class="nav-item"><a href=""><i class="la la-male"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">خصائص المنتج  </span>
                            <span
                                class="badge badge badge-success badge-pill float-right mr-2"> </span>
                        </a>
                        <ul class="menu-content">
                            <li class="active"><a class="menu-item" href="{{route('admin.attributes')}}"
                                                  data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                            </li>
                            <li><a class="menu-item" href="{{route('admin.attributes.create')}}" data-i18n="nav.dash.crypto">أاضافة
                                    جديدة </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href=""><i class="la la-male"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">قيم الخصائص </span>
                 </a>
                 <ul class="menu-content">
                     <li class="active"><a class="menu-item" href="{{route('admin.options')}}"
                                           data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                     </li>
                     <li><a class="menu-item" href="{{route('admin.options.create')}}" data-i18n="nav.dash.crypto">أاضافة
                             جديدة </a>
                     </li>
                 </ul>
             </li>



                     <li class="nav-item  "><a href=""><i class="la la-group"></i>
                                   <span class="menu-title" data-i18n="nav.dash.main"> الافكار </span>
                                   <span
                                          class="badge badge badge-danger badge-pill float-right mr-2"></span>
                            </a>
                            <ul class="menu-content">
                                   <li class=""><a class="menu-item" href=""
                                                 data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                                   </li>
                                   {{-- <li class=><a class="menu-item" href=""
                                                 data-i18n="nav.dash.crypto">أضافة
                                          </a>
                                   </li> --}}
                            </ul>
                     </li>

                     
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main"> {{__('admin/sidebar.settings')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main">{{__('admin/sidebar.shipping methods')}} </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','free')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/sidebar.free')}} </a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','inner')}}"> {{__('admin/sidebar.inner')}}
                                     </a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods','outer')}}"
                                   data-i18n="nav.templates.vert.compact_menu"> {{__('admin/sidebar.outer')}} </a>
                            </li>
                        </ul>
                    </li>

                    <li><a class="menu-item" href="#"
                           data-i18n="nav.templates.vert.main"> {{__('admin/sidebar.main slider')}} </a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href=""
                                   data-i18n="nav.templates.vert.classic_menu">صور الاسليدر </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </li>
            <li class=" navigation-header">


                   






              </ul>
       </div>
</div>