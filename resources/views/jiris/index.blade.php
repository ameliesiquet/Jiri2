<x-layouts.main>
    <h1 class="text-3xl font-bold">{{__('My Jiris')}}</h1>
    <section class="flex flex-col gap-10">
        <div class="flex flex-col gap-2">
            @if($pastJiris)
                <h2 class="font-bold">{{__('Past Jiris')}}</h2>
                <x-jiris.list :jiris="$pastJiris" />
            @endif
        </div>
        <div class="flex flex-col gap-2">
            @if($upcomingJiris)
                <h2 class="font-bold">{{__('Upcoming Jiris')}}</h2>
                <x-jiris.list :jiris="$upcomingJiris" />
            @endif
        </div>
    </section>
    <div class="m-4 mx-0">
        <a href="/jiris/create"
           class="font-bold underline text-rose-900 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="currentColor"
                 class="w-6 h-6">
                <path fill-rule="evenodd"
                      d="M5.625 1.5H9a3.75 3.75 0 0 1 3.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 0 1 3.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 0 1-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875ZM12.75 12a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V18a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V12Z"
                      clip-rule="evenodd" />
                <path d="M14.25 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 16.5 7.5h-1.875a.375.375 0 0 1-.375-.375V5.25Z" />
            </svg>
            <span>{{__('Create a new Jiri')}}</span></a>
    </div>
</x-layouts.main>
