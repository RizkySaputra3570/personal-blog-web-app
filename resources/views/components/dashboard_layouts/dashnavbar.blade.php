        <header>
            <nav class="navbar navbar-expand-lg bg-info">
                <div class="container">
                    <a href="/dashboard" class="navbar-brand">CaptureStory Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="/dashboard" class="nav-link text-white">Blogs</a>
                            </li>
                            @can('administrator')
                            <li class="nav-item">
                                <a href="/dashboard/category" class="nav-link text-white">Categories</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-white">Users</a>
                            </li>
                            @endcan
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="btn btn-light dropdown-toggle" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear"></i>
                                    Options
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-item">
                                        <i class="bi bi-person-fill"></i>
                                        {{ auth()->user()->name }}
                                    </li>
                                    <li class="dropdown-item"><hr class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="/posts" class="btn btn-sm btn-light">
                                            <i class="bi bi-house-fill"></i>
                                            Home
                                        </a>                                        
                                    </li>
                                    <li class="dropdown-item"><hr class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="/signout" class="btn btn-sm btn-light">
                                            <i class="bi bi-box-arrow-left"></i>
                                            Sign Out
                                        </a>                                    
                                    </li>
                                </ul>
                            </li>
                        </ul>                        
                    </div>                    
                </div>
            </nav>
        </header>