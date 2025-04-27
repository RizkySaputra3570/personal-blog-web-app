        <header>
            <nav class="navbar navbar-expand-lg bg-primary">
                <div class="container">
                    <a href="/posts" class="navbar-brand">CaptureStory</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a href="/posts" class="nav-link text-white">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="/about" class="nav-link text-white">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="/contact" class="nav-link text-white">Contact</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="btn btn-light dropdown-toggle" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear"></i>
                                    Options
                                </a>
                                <ul class="dropdown-menu">
                                    @auth
                                    <li class="dropdown-item">
                                        <i class="bi bi-person-fill"></i>
                                        {{ auth()->user()->name }}
                                    </li>
                                    <li class="dropdown-item"><hr class="dropdown-divider"></li>
                                    <li class="dropdown-item">
                                        <a href="/dashboard" class="btn btn-sm btn-light">
                                            Back to Dashboard
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="/signout" class="btn btn-sm btn-light">
                                            Sign Out
                                        </a>
                                    </li>
                                    @else
                                    <li class="dropdown-item">
                                        <a href="/signup" class="btn btn-sm btn-light">
                                            Sign Up
                                        </a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="/signin" class="btn btn-sm btn-light">
                                            Sign In
                                        </a>                                    
                                    </li>
                                    @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </nav>
        </header>