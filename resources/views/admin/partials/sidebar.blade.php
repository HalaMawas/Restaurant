<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
    <!-- main menu header-->

    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="main-menu-content">
        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">



            <li class=" nav-item"><a href="#"><i class="icon-android-restaurant"></i><span data-i18n="nav.menu_levels.main" class="menu-title">التصنيفات</span></a>
                <ul class="menu-content">
                   <li><a href="{{url('control/menu/create')}}" data-i18n="nav.dash.main" class="menu-item">إضافة تصنيف جديد</a></li>
                    <li><a href="{{url('control/menu')}}" data-i18n="nav.dash.main" class="menu-item">تعديل تصنيف</a> </li>

                 <!--     <li><a href="#" data-i18n="nav.menu_levels.second_level_child.main" class="menu-item"><i class="icon-paper"></i>القائمة</a>
                        <ul class="menu-content">
                            <li><a href="{{url('menu/create')}}" data-i18n="nav.dash.main" class="menu-item">Add New Menu Type</a>
                            </li>
                            <li><a href="{{url('menu')}}" data-i18n="nav.dash.main" class="menu-item">Edit Menu Type</a>
                            </li>
                        </ul>
                    </li> -->
                     
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-android-person"></i><span data-i18n="nav.advance_cards.main" class="menu-title">الوجبات</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('control/meal/create')}}" data-i18n="nav.menu_levels.second_level_child.third_level" class="menu-item">إضافة </a>
                    </li>
                    <li><a href="{{url('control/meal')}}" data-i18n="nav.menu_levels.second_level_child.third_level_child.main" class="menu-item">تعديل </a>
                    </li>
                    <!--  <li><a href="{{url('offer')}}" data-i18n="nav.menu_levels.second_level_child.third_level_child.main" class="menu-item">العروض</a>
                    </li> -->
                </ul>
            </li>
             


            <li class=" nav-item"><a href="{{url('control/order')}}"><i class="icon-clipboard"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">الطلبات</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-android-contacts"></i><span data-i18n="nav.advance_cards.main" class="menu-title"> الطاولات</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('control/table/create')}}" data-i18n="nav.cards.card_statistics" class="menu-item">إضافة طاولة</a>
                    </li>
                    <li><a href="{{url('control/table')}}" data-i18n="nav.cards.card_charts" class="menu-item">تعديل طاولة</a>
                    </li>
                </ul>
            </li>
           <!--  <li class=" nav-item"><a href="#"><i class="icon-truck2"></i><span data-i18n="nav.advance_cards.main" class="menu-title">سيارات التوصيل</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('taxi/create')}}" data-i18n="nav.cards.card_statistics" class="menu-item">إضافة سيارة</a>
                    </li>
                    <li><a href="{{url('taxi')}}" data-i18n="nav.cards.card_charts" class="menu-item">تعديل سيارة</a>
                    </li>
                </ul>
            </li> -->
 			
          <!--   <li class=" nav-item"><a href="{{url('send-client-notification')}}"><i class="icon-push"></i><span data-i18n="nav.form_layouts.form_layout_basic" class="menu-title">أشعارات الزبائن</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-envelope"></i><span data-i18n="nav.advance_cards.main" class="menu-title">slider Application</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('app-Slide/create')}}" data-i18n="nav.cards.card_statistics" class="menu-item">إضافة slider</a>
                    </li>
                    <li><a href="{{url('app-Slide')}}" data-i18n="nav.cards.card_statistics" class="menu-item">تعديل slider</a>
                    </li>
                    
                </ul>
            </li> -->
            <li class=" nav-item"><a href="#"><i class="icon-android-person"></i><span data-i18n="nav.advance_cards.main" class="menu-title">حسابات المستخدمين</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('control/createuser')}}" data-i18n="nav.cards.card_statistics" class="menu-item">إضافة حساب</a>
                    </li>
                    <li><a href="{{url('control/user')}}" data-i18n="nav.cards.card_charts" class="menu-item">تعديل حساب </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="icon-android-person"></i><span data-i18n="nav.advance_cards.main" class="menu-title">الموظفين </span></a>
                <ul class="menu-content">
                    <li><a href="{{url('control/employee/create')}}" data-i18n="nav.cards.card_statistics" class="menu-item">إضافة موظف</a>
                    </li>
                    <li><a href="{{url('control/employee')}}" data-i18n="nav.cards.card_charts" class="menu-item">تعديل موظف </a>
                    </li>
                </ul>
            </li>
            <!-- <li class=" nav-item"><a href="#"><i class="icon-android-people"></i><span data-i18n="nav.advance_cards.main" class="menu-title"> صلاحيات المستخدمين</span></a>
                <ul class="menu-content">
                    <li><a href="{{url('deleted_restaurant')}}" data-i18n="nav.cards.card_statistics" class="menu-item">Restaurant</a>
                    </li>
                    <li><a href="{{url('permission/create')}}" data-i18n="nav.cards.card_charts" class="menu-item">إضافة</a>
                    </li>
                    <li><a href="{{url('permission')}}" data-i18n="nav.cards.card_charts" class="menu-item">تعديل</a>
                    </li>

                </ul>
            </li> -->
           <!--  <li class=" nav-item"><a href="#"><i class="icon-android-delete"></i><span data-i18n="nav.advance_cards.main" class="menu-title">العناصر المحذوفة</span></a>
                <ul class="menu-content">
                  <!--   <li><a href="{{url('deleted_restaurant')}}" data-i18n="nav.cards.card_statistics" class="menu-item">Restaurant</a>
                    </li> -->
                   <!--  <li><a href="{{url('deleted_menu')}}" data-i18n="nav.cards.card_charts" class="menu-item">التصنيفات</a>
                    </li>
                    <li><a href="{{url('deleted_meal')}}" data-i18n="nav.cards.card_charts" class="menu-item">السلع</a>
                    </li>
                    <li><a href="{{url('deleted_customer')}}" data-i18n="nav.cards.card_charts" class="menu-item">الزبائن</a>
                    </li>
                </ul>
            </li> --> 

          <!--   <li class=" nav-item"><a href="#"><i class="icon-ellipsis"></i><span data-i18n="nav.advance_cards.main" class="menu-title">Others</span></a>
                <ul class="menu-content"> -->
                   <!--  <li><a href="{{url('cost')}}" data-i18n="nav.cards.card_statistics" class="menu-item">سعر التوصيل</a>
                    <li><a href="{{url('logo')}}" data-i18n="nav.cards.card_statistics" class="menu-item"> شعار الشركة</a>
                    </li>
					 <li><a href="{{url('main-center')}}" data-i18n="nav.cards.card_statistics" class="menu-item">المركز</a>
                    </li> 
                    <li><a href="{{url('messages')}}" data-i18n="nav.cards.card_statistics" class="menu-item">رسائل الاشعارات</a>
                    </li> -->
					<!--   <li><a href="{{url('discount/create')}}" data-i18n="nav.cards.card_statistics" class="menu-item">حسم</a>
                    </li> -->

              <!--   </ul>
            </li> -->
        </ul>
    </div>
    <!-- /main menu content-->
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
    <!-- main menu footer-->
</div>