<div class="leftpanel">
        
    <div class="leftmenu">        
        <ul class="nav nav-tabs nav-stacked">
            <li class="nav-header">Navigation</li>
            <li  class="{{ (request()->is('*/dashboard')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('dashboard'))}}"><span class="iconfa-laptop"></span> Dashboard</a></li>
            <li  class="{{ (request()->is('*/banner')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('banner'))}}"><span class="iconfa-tags"></span> Banner Management</a></li>
            <li  class="{{ (request()->is('*/customer')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('customer'))}}"><span class="iconfa-tags"></span> Customer Management</a></li>
            <li  class="{{ (request()->is('*/order')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('order'))}}"><span class="iconfa-tags"></span> Order Management</a></li>
            <li  class="{{ (request()->is('*/store')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('store'))}}"><span class="iconfa-tags"></span> Store Management</a></li>
            <li  class="{{ (request()->is('*/price')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('price'))}}"><span class="iconfa-tags"></span> Price Management</a></li>
            <li  class="{{ (request()->is('*/cities')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('cities'))}}"><span class="iconfa-tags"></span> Cities Management</a></li>
            <li  class="{{ (request()->is('*/driver')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('driver'))}}"><span class="iconfa-tags"></span> Driver Management</a></li>
            @if(Auth::user()->id==1)
            <li  class="{{ (request()->is('*/users')) ? 'active' : '' }}"><a href="{{url(Helpers::admin_url('users'))}}"><span class="iconfa-tags"></span> Users Management</a></li>
            @endif
            {{-- <li><a href="buttons.html"><span class="iconfa-hand-up"></span> Buttons &amp; Icons</a></li>
            <li class="dropdown"><a href=""><span class="iconfa-pencil"></span> Forms</a>
                <ul>
                    <li><a href="forms.html">Form Styles</a></li>
                    <li><a href="wizards.html">Wizard Form</a></li>
                    <li><a href="wysiwyg.html">WYSIWYG</a></li>
                    <li><a href="registration.html">Registration Page</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-briefcase"></span> UI Elements &amp; Widgets</a>
                <ul>
                    <li><a href="elements.html">Theme Components</a></li>
                    <li><a href="bootstrap.html">Bootstrap Components</a></li>
                    <li><a href="boxes.html">Headers &amp; Boxes</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Tables</a>
                <ul>
                    <li><a href="table-static.html">Static Table</a></li>
                    <li class="dropdown"><a href="table-dynamic.html">Dynamic Table</a></li>
                </ul>
            </li>
            <li><a href="media.html"><span class="iconfa-picture"></span> Media Manager</a></li>
            <li><a href="typography.html"><span class="iconfa-font"></span> Typography</a></li>
            <li><a href="charts.html"><span class="iconfa-signal"></span> Graph &amp; Charts</a></li>
            <li class="dropdown"><a href=""><span class="iconfa-envelope"></span> Messaging</a>
                <ul>
                    <li><a href="messages.html">Mailbox</a></li>
                    <li><a href="chat.html">Chat Page</a></li>
                </ul>
            </li>
            <li><a href="calendar.html"><span class="iconfa-calendar"></span> Calendar</a></li>
            <li class="dropdown"><a href=""><span class="iconfa-book"></span> Other Pages</a>
                <ul>
                    <li><a href="404.html">404 Error Page</a></li>
                    <li><a href="editprofile.html">Edit Profile</a></li>
                    <li><a href="invoice.html">Invoice Page</a></li>
                    <li><a href="discussion.html">Discussion Page</a></li>
                    <li><a href="topic.html">View Topic Page</a></li>
                    <li><a href="blog.html">Grid Blog List</a></li>
                    <li><a href="blank.html">Blank Page</a></li>
                    <li><a href="timeline.html">Timeline Page</a></li>
                    <li><a href="people.html">People Directory</a></li>
                    <li><a href="lockscreen.html">Lock Screen</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href=""><span class="iconfa-th-list"></span> Three Level Menu Sample</a>
                <ul>
                    <li class="dropdown"><a href="">Second Level Menu</a>
                    <ul>
                        <li><a href="">Third Level Menu</a></li>
                        <li><a href="">Another Third Level Menu</a></li>
                    </ul>
                 </li>
                </ul>
            </li> --}}
        </ul>
    </div><!--leftmenu-->
    
</div><!-- leftpanel -->