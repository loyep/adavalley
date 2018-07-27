<header class="py-4 border-b-2 border-gray-lighter">
    <div class="container mx-auto">
        <div class="flex items-center justify-between px-8">
            <span class="text-2xl tracking-tight font-semibold">
                <a class="text-green-dark no-underline" href="{{ route('home') }}">CMS</a>
            </span>
            <div class="">
                <div class="flex items-center">
                    <a class="text-lg leading-normal text-blue hover:text-blue-dark no-underline ml-8" href="{{ route('machines.create') }}">Machines</a>
                    <a class="text-lg leading-normal text-blue hover:text-blue-dark no-underline ml-8" href="{{ route('work-orders.index') }}">Work Orders</a>
                    <a class="text-lg leading-normal text-blue hover:text-blue-dark no-underline ml-8" href="#">Vendors</a>
                </div>
            </div>
        </div>
    </div>
</header>