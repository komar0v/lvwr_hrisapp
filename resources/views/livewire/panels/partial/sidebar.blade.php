<div>
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('panelDashboardPage') ? '' : 'collapsed' }}" wire:navigate href="{{ route('panelDashboardPage') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('panelApplicantsIndexPage')||request()->routeIs('panelApplicantsFilterPage')||request()->is('panels/applicant/*') ? '' : 'collapsed' }}" wire:navigate href="{{ route('panelApplicantsIndexPage') }}">
                    <i class="bi bi-file-earmark-easel"></i>
                    <span>Applicants</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('panelVacancyJobsIndexPage')||request()->routeIs('panelVacancyJobCreatePage')||request()->is('panels/job/*') ? '' : 'collapsed' }}" wire:navigate href="{{ route('panelVacancyJobsIndexPage') }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Jobs</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('panels/system/*') ? '' : 'collapsed' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gem"></i><span>System</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="icons-nav" class="nav-content {{ request()->is('panels/system/*') ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
                    <li>
                        <a wire:navigate href="{{ route('panelSystemLogViewerPage') }}" class="{{ request()->routeIs('panelSystemLogViewerPage') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Logs</span>
                        </a>
                        <a wire:navigate href="{{ route('panelSchedulerLogViewerPage') }}" class="{{ request()->routeIs('panelSchedulerLogViewerPage') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Scheduler Logs</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

</div>