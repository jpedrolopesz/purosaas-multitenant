<header class="sticky top-0 bg-white border-b border-slate-200 z-30">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 -mb-px">

            <div class="logo ml-14">
                <a href="">
                    <img class="mx-auto h-8 w-auto ml-2" src="/uploads/avatars/{{Auth::guard('admin')->user()->logo}}" alt="logo">
                </a>
            </div>

            <!-- Header: Right side -->
            <div class="flex items-center space-x-3">

                <!-- Info button -->
                <div class="relative inline-flex" x-data="{ open: false }">
                    <button
                        class="w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 transition duration-150 rounded-full"
                        :class="{ 'bg-slate-200': open }"
                        aria-haspopup="true"
                        @click.prevent="open = !open"
                        :aria-expanded="open"
                    >
                        <span class="sr-only">Info</span>
                        <svg class="w-4 h-4" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path class="fill-current text-slate-500" d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z" />
                        </svg>
                    </button>
                    <div
                        class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-cloak
                    >
                        <div class="text-xs font-semibold text-slate-400 uppercase pt-1.5 pb-2 px-3">Need help?</div>
                        <ul>
                            <li>
                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                        <rect y="3" width="12" height="9" rx="1" />
                                        <path d="M2 0h8v2H2z" />
                                    </svg>
                                    <span>Documentation</span>
                                </a>
                            </li>
                            <li>
                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                        <path d="M10.5 0h-9A1.5 1.5 0 000 1.5v9A1.5 1.5 0 001.5 12h9a1.5 1.5 0 001.5-1.5v-9A1.5 1.5 0 0010.5 0zM10 7L8.207 5.207l-3 3-1.414-1.414 3-3L5 2h5v5z" />
                                    </svg>
                                    <span>Support Site</span>
                                </a>
                            </li>
                            <li>
                                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3" href="#0" @click="open = false" @focus="open = true" @focusout="open = false">
                                    <svg class="w-3 h-3 fill-current text-indigo-300 shrink-0 mr-2" viewBox="0 0 12 12">
                                        <path d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z" />
                                    </svg>
                                    <span>Contact us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Divider -->
                <hr class="w-px h-6 bg-slate-200" />

                <!-- User button -->
                <div class="relative inline-flex" x-data="{ open: false }">
                    <button
                        class="inline-flex justify-center items-center group"
                        aria-haspopup="true"
                        @click.prevent="open = !open"
                        :aria-expanded="open"
                    >
                        <img class="w-8 h-8 rounded-full" src="/uploads/avatars/{{Auth::guard('admin')->user()->avatar}}" width="32" height="32" alt="User" />
                        <div class="flex items-center truncate">
                            <span class="truncate ml-2 text-sm font-medium group-hover:text-slate-800">{{Auth::guard('admin')->user()->company}}</span>
                            <i class='bx bx-chevron-down text-xl'></i>
                        </div>
                    </button>
                    <div
                        class="origin-top-right z-10 absolute top-full right-0 min-w-44 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                        @click.outside="open = false"
                        @keydown.escape.window="open = false"
                        x-show="open"
                        x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        x-cloak
                    >
                        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200">
                            <div class="font-medium text-slate-800">{{Auth::guard('admin')->user()->name}}</div>
                            <div class="text-xs text-slate-500 italic">Administrator</div>
                        </div>

                        <ul>
                            <li>
                                <a href="{{route('central.account.company.index')}}"
                                   class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3">
                                    Account
                                </a>
                            </li>
                            <li>

                                <a href=""
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="font-medium text-sm text-indigo-500 hover:text-indigo-600 flex items-center py-1 px-3">
                                    Log out
                                </a>
                                <form id="logout-form" action="{{route('central.logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>


                            </li>

                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
</header>


