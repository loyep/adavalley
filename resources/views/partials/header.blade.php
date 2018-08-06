<header>
    <nav class="flex items-center justify-between flex-wrap bg-blue-darker p-6">
        <div class="flex items-center flex-no-shrink mr-6">
            <a class="text-2xl tracking-tight font-semibold no-underline text-white hover:text-blue-light" href="{{ route('home') }}">CMMS</a>
        </div>
        <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-white border-white hover:text-blue-light hover:border-blue-light">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
        </div>
        <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
                <a href="{{ route('work-orders.index') }}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-white hover:text-blue-light mr-4">
                    Work Orders
                </a>
                <a href="{{ route('assets.index') }}" class="no-underline block mt-4 lg:inline-block lg:mt-0 text-white hover:text-blue-light mr-4">
                    Assets
                </a>
            </div>
            <div>
                <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-blue-light hover:text-blue-light mt-4 lg:mt-0">Sign In</a>
            </div>
        </div>
    </nav>
</header>