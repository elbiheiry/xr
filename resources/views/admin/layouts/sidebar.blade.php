<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <button class="toggle-btn">
        <i class="fa fa-times"></i>
    </button>
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ aurl('images/logo.png') }}" />
    </a>
    <ul>
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                - Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.settings.index') ? 'active' : '' }}">
            <a href="{{ route('admin.settings.index') }}">
                - Site settings
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.home.index') ? 'active' : '' }}">
            <a href="{{ route('admin.home.index') }}">
                - Homepage
            </a>
        </li>
        <li
            class="sub-menu {{ request()->routeIs('admin.about.index') || request()->routeIs('admin.works.index') || request()->routeIs('admin.works.edit') || request()->routeIs('admin.works.create') || request()->routeIs('admin.testimonials.index') || request()->routeIs('admin.testimonials.edit') || request()->routeIs('admin.testimonials.create') || request()->routeIs('admin.partners.index') ? 'active' : '' }}">
            <a rel="noreferrer" href="javascript:void(0);">
                - About us
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li class="{{ request()->routeIs('admin.about.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.about.index') }}">
                        Content
                    </a>
                </li>
                <li
                    class="{{ request()->routeIs('admin.works.index') || request()->routeIs('admin.works.edit') || request()->routeIs('admin.works.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.works.index') }}">
                        Work process
                    </a>
                </li>
                <li
                    class="{{ request()->routeIs('admin.testimonials.index') || request()->routeIs('admin.testimonials.edit') || request()->routeIs('admin.testimonials.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        Testimonials
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.partners.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.partners.index') }}">
                        Our partners
                    </a>
                </li>
            </ul>
        </li>

        <li
            class="{{ request()->routeIs('admin.solutions.index') || request()->routeIs('admin.solutions.create') || request()->routeIs('admin.solutions.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.solutions.index') }}">
                - Solutions
            </a>
        </li>

        <li
            class="{{ request()->routeIs('admin.articles.index') || request()->routeIs('admin.articles.create') || request()->routeIs('admin.articles.edit') ? 'active' : '' }}">
            <a href="{{ route('admin.articles.index') }}">
                - Articles
            </a>
        </li>

        <li
            class="{{ request()->routeIs('admin.members.index') || request()->routeIs('admin.members.create') || request()->routeIs('admin.members.edit') || request()->routeIs('admin.members.links.index') ? 'active' : '' }}">
            <a href="{{ route('admin.members.index') }}">
                - Team
            </a>
        </li>

        <li class="{{ request()->routeIs('admin.links.index') ? 'active' : '' }}">
            <a href="{{ route('admin.links.index') }}">
                - Social links
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.messages.index') ? 'active' : '' }}">
            <a href="{{ route('admin.messages.index') }}">
                - Messages
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.subscribers.index') ? 'active' : '' }}">
            <a href="{{ route('admin.subscribers.index') }}">
                - Subscribers
            </a>
        </li>
    </ul>
    <!--End Ul-->
</aside>
<!--End Aside-->
