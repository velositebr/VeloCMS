<!-- ============================================================== -->
<!-- toggle and nav items -->
<!-- ============================================================== -->
<ul class="navbar-nav float-left mr-auto ml-3 pl-1">
    <!-- Notification -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
            id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <span><i data-feather="bell" class="svg-icon"></i></span>
            <span class="badge badge-primary notify-no rounded-circle">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
            <ul class="list-style-none">
                <li>
                    <div class="message-center notifications position-relative">
                        <!-- Message -->
                        <a href="javascript:void(0)"
                            class="message-item d-flex align-items-center border-bottom px-3 py-2">
                            <div class="btn btn-danger rounded-circle btn-circle"><i
                                    data-feather="airplay" class="text-white"></i></div>
                            <div class="w-75 d-inline-block v-middle pl-2">
                                <h6 class="message-title mb-0 mt-1">Sem notificações</h6>
                                <span class="font-12 text-nowrap d-block text-muted">Sem notificações novas</span>
                                <span class="font-12 text-nowrap d-block text-muted">0:00</span>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                        <strong>Todas as notificações</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <!-- End Notification -->
    <!-- ============================================================== -->
    @canany('manage-users', 'manage-contacts', 'manage-settings')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i data-feather="settings" class="svg-icon"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @can('manage-users')
            <a class="dropdown-item" href="{{ route('backend.users.index') }}">Usuários</a>
            @endcan
            @can('manage-contacts')
            <a class="dropdown-item" href="{{ route('backend.contacts.index') }}">Contatos</a>
            @endcan
            @can('manage-settings')
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('backend.settings.index') }}">Configurações</a>
            @endcan
        </div>
    </li>
    @endcanany
</ul>
