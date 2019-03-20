<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <a href="{{ route('voyager.profile') }}" class="profile-link">

                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" class="avatar" alt="{{ app('VoyagerAuth')->user()->name }} avatar">
                    <h4>{{ ucwords(app('VoyagerAuth')->user()->name) }}</h4>
                    <p>{{ app('VoyagerAuth')->user()->email }}</p>
                    <div style="clear:both"></div>
                </div>
                </a>
            </div>

        </div>
        <div id="adminmenu">
            @if(\Auth::user()->hasRole(['admin', 'investis', "investisdom"]))
                <admin-menu :items="{{ investis_menu('admin', '_json') }}"></admin-menu>
            @else
                <admin-menu :items="{{ investis_menu('user', '_json') }}"></admin-menu>
            @endif
        </div>
    </nav>
</div>
