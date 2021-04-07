<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            <img alt="Logo" class="w-130px" src="{{ asset('Back') }}/logo3.png"/>
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item menu-item-active {{ Route::is('domain.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('domain.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-architecture-and-city"></i>
                        <span class="menu-text">AnaSayfa</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('customer.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('customer.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-group"></i>
                        <span class="menu-text">Müşteri</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('company.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('company.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-shield"></i>
                        <span class="menu-text">Firma</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('product.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('product.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-delivery-package"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('user.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('user.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-user-1"></i>
                        <span class="menu-text">Kullanıcılar</span>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('back.setting.index') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('back.setting.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-settings"></i>
                        <span class="menu-text">Ayarlar</span>
                    </a>
                </li>
              
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>