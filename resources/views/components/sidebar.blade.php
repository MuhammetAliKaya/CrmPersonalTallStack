<aside class="w-full" aria-label="Sidebar">
    <div x-data="{ currenUrl: location.pathname }" class=" overflow-y-auto py-4 px-3 rounded dark:bg-gray-800">
        <ul x-data="{spiltedurl:currenUrl.split('/')}" class="space-y-2 ">
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100"
                :class="spiltedurl.findIndex(segment => segment === 'profil')>=1 ? 'bg-blue-100' : ''">
                <a href="{{route('profil',['user' => auth()->user()->name])}}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Profile</span>
                </a>
            </li>
            <li class="flex xs:justify-center md:justify-start text-blue-300 hover:bg-gray-100"
                :class="currenUrl=='/dashboard' ? 'bg-blue-100' : ''">
                <a href=" http://localhost:8000/dashboard"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white  dark:hover:bg-gray-700 text-blue-300 w-full">
                    <svg aria-hidden="true" class="w-6 h-6  transition duration-75 text-blue-500" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 text-blue-300 ">Dashboard</span>
                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100"
                :class="currenUrl=='/kanban' ? 'bg-blue-100' : ''">
                <a href=" http://localhost:8000/kanban"
                    class="flex  items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                    <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75   text-blue-500"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Kanban</span>

                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100"
                :class="currenUrl=='/customers' ? 'bg-blue-100' : ''">
                <a href="{{route('customers')}}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Customers</span>
                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100">
                <a href=" #"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Products</span>
                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100">
                <a href=" #"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white "
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Sign In</span>
                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100">
                <a href=" #"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Sign Up</span>
                </a>
            </li>
            <li class="flex  xs:justify-center md:justify-start hover:bg-gray-100">
                <a href="{{route('logout')}}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 w-full">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-blue-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap text-blue-300">Log Out</span>
                </a>
            </li>
        </ul>

    </div>
</aside>