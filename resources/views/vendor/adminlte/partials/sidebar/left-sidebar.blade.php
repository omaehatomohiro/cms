<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                @if (Auth::check())
                    @if( \Route::is('articletype.*') )
                    <li class="nav-header" style="padding: 1.7rem 1rem .5rem;">記事タイプ</li>
                        @forelse($articleTypes as $articleType)
                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/posts">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>{{$articleType->name}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('ArticleTypeController@create') }}">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>記事タイプ追加</p>
                            </a>
                        </li>
                        @empty
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="far fa-fw fa-file "></i>
                                <p>登録なし</p>
                            </a>
                        </li>
                        @endforelse
                    @else
                        <li class="nav-header" style="padding: 1.7rem 1rem .5rem;">投稿</li>
                       

                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/posts">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>投稿一覧</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/post/create">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>新規投稿</p>
                            </a>
                        </li>


                        <li class="nav-header">分類</li>
  
                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('CategoryController@index',$articleType)}}">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>カテゴリ一覧</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/category/create">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>カテゴリ追加</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('TagController@index',$articleType)}}">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>タグ一覧</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/tag/create">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>タグ追加</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ action('AuthorController@index',$articleType)}}">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>投稿者追加</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/articletype/{{$articleType->id}}/author/create">
                                <i class="{{ $item['icon'] ?? 'far fa-fw fa-circle' }} {{isset($item['icon_color']) ? 'text-'.$item['icon_color'] : ''}}"></i>
                                <p>投稿者追加</p>
                            </a>
                        </li>

                    @endif
                @endif
                <li class="nav-header ">アカウント設定</li>
                {{-- Configured sidebar links --}}
                {{--　@each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') --}}
            
            </ul>
        </nav>
    </div>

</aside>
