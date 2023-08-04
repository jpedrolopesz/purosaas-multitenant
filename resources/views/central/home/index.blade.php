@extends('layouts.guest')

    <!-- Section 1 -->
    <section class="relative w-full bg-white" x-data="{ showMenu: false }">
    <div class="relative z-50 w-full h-24">
        <div class="container flex items-center justify-center h-full max-w-6xl px-1 mx-auto sm:justify-between xl:px-0">

            <a href="/" class="relative flex items-center inline-block h-5 h-full font-black leading-none">
                <span class="ml-3 text-xl text-gray-800">{{env('APP_NAME')}}<span class="text-indigo-600">.</span></span>
            </a>

            <nav class="absolute top-0 left-0 z-50 flex-col items-center justify-between hidden w-full h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 shadow-xl md:shadow-none md:flex md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:relative" :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                <a href="#home" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Home</a>
                <a href="#features" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Features</a>
                <a href="#price" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Pricing</a>
                <a href="#faq" class="font-bold duration-100 transition-color hover:text-indigo-600">FAQ</a>
                <div class="flex flex-col block w-full font-medium border-t border-gray-200 md:hidden">

                    <a href="https://purosaas.gumroad.com/l/nagld" class=" ml-2 relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition-all transition duration-100 duration-300 bg-indigo-600 rounded shadow-md fold-bold sm:w-full lg:shadow-none hover:shadow-xl">
                        Buy Now
                    </a>
                </div>
            </nav>

            <div class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">


                <a href="https://purosaas.gumroad.com/l/nagld" class=" btn text-white bg-indigo-500 hover:bg-indigo-600 w-full hover:shadow-xl">
                    Buy Now
                </a>




            </div>

            <div @click="showMenu = !showMenu" class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
                <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
                <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
            </div>

        </div>
    </div>

    <div class="relative items-center justify-center w-full overflow-x-hidden lg:pb-40 sm:pt-8 md:pt-12">
        <div class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto lg:flex-row xl:px-0">
            <div class="z-30 flex flex-col items-center w-full max-w-xl text-center lg:items-start lg:w-1/2 lg:pt-24 lg:text-left">
                <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 lg:pr-16 sm:text-4xl lg:mb-8">PuroSaaS is the perfect starting point for your next SAAS application</h1>
                <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">PuroSaas Laravel is the complete recurring billing solution. A starter kit for your next big SaaS Multi-Tenancy application.</p>

                <div class="flex flex-row">
                    <a href="{{route('auth.home-login')}}" class="relative hover:shadow-xl self-start inline-block w-auto px-6 py-4 mx-auto mt-0 text-base font-bold text-white bg-indigo-500 rounded-md  sm:mt-1 lg:mx-0">
                        Live Demo Tenancy</a>
                    <span class="p-4">
                    </span>
                    <a href="{{route('central.auth.login')}}" class="relative hover:shadow-xl self-start inline-block w-auto px-6 py-4 mx-auto mt-0 text-base font-bold text-white bg-indigo-500 rounded-md sm:mt-1 lg:mx-0">
                        Live Demo Super Admin
                    </a>
                </div>
                <!-- Integrates with section -->
                <div class="flex-col hidden mt-12 sm:flex lg:mt-24">
                    <p class="mb-4 text-sm font-medium tracking-widest text-gray-500 uppercase">Integrates With</p>
                    <div class="flex">

                        <!--Stripe -->
                        <a href="https://stripe.com">
                            <svg class="h-8 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600" viewBox="0 0 2499 1037" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1"><g><path d="M261.062 466.768c-53.833-19.912-83.335-35.399-83.335-59.735 0-20.652 16.963-32.45 47.201-32.45 55.31 0 112.09 21.388 151.178 40.559l22.124-136.427c-30.973-14.752-94.397-39.088-182.151-39.088-61.947 0-113.573 16.223-150.443 46.46-38.352 31.71-58.263 77.434-58.263 132.744 0 100.293 61.211 143.07 160.769 179.203 64.159 22.86 85.547 39.088 85.547 64.16 0 24.336-20.652 38.346-58.263 38.346-46.46 0-123.153-22.86-173.302-52.356L0 786.087c42.771 24.337 122.417 49.409 205.017 49.409 65.63 0 120.204-15.487 157.08-44.984 41.293-32.45 62.682-80.381 62.682-142.328 0-102.511-62.683-145.282-163.717-181.416zm523.877-80.387l22.124-135.692H690.265V85.966l-157.035 25.84-22.677 138.883-55.232 8.96-20.675 126.732h75.68v266.227c0 69.32 17.7 117.257 53.833 146.754 30.238 24.336 73.745 36.134 134.956 36.134 47.196 0 75.957-8.109 95.868-13.275V678.416c-11.062 2.953-36.133 8.114-53.097 8.114-36.134 0-51.62-18.435-51.62-60.47V386.38h94.673zm350.752-143.618c-51.62 0-92.92 27.102-109.142 75.775l-11.062-67.849H855.459v573.745h182.887V452.017c22.865-28.026 55.31-38.159 99.558-38.159 9.59 0 19.911 0 32.45 2.213V247.188c-12.539-2.948-23.6-4.425-34.663-4.425zm171.095-48.86c53.098 0 95.869-43.507 95.869-96.604 0-53.839-42.771-96.61-95.869-96.61-53.838 0-96.609 42.771-96.609 96.61 0 53.097 42.771 96.604 96.61 96.604zm-92.184 56.786h183.628v573.745h-183.628V250.689zm703.999 51.62c-32.45-42.035-77.434-62.682-134.956-62.682-53.097 0-99.558 22.124-143.07 68.584l-9.585-57.522h-160.769v786.134l182.893-30.232V822.22c28.02 8.85 56.78 13.275 82.594 13.275 45.725 0 112.096-11.798 163.717-67.843 49.408-53.839 74.485-137.168 74.485-247.052 0-97.345-18.44-171.09-55.31-218.291zm-151.92 353.983c-14.75 28.025-37.61 42.777-64.159 42.777-18.435 0-34.662-3.69-49.408-11.062V415.142c30.973-32.445 58.993-36.134 69.32-36.134 46.46 0 69.32 50.15 69.32 148.23 0 56.045-8.11 99.557-25.073 129.054zm731.566-123.894c0-91.443-19.912-163.717-59-214.602-39.822-51.62-99.557-78.169-175.514-78.169-155.608 0-252.212 115.044-252.212 299.408 0 103.247 25.808 180.68 76.692 230.089 45.725 44.248 111.361 66.372 196.168 66.372 78.169 0 150.442-18.435 196.167-48.673l-19.912-125.365c-44.989 24.336-97.345 37.61-156.344 37.61-35.398 0-59.734-7.378-77.434-22.864-19.175-16.223-30.237-42.771-33.921-80.382h303.097c.736-8.85 2.213-50.15 2.213-63.424zm-306.787-48.672c5.16-81.859 27.284-120.205 69.32-120.205 41.3 0 62.688 39.087 65.636 120.205H2191.46z"></path></g></g></svg>
                        </a>
                        <!--Laravel -->
                        <a href="https://github.com/laravel/laravel">
                            <svg class="h-8 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600" viewBox="0 0 50 52" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                <path d="M49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1-.402.694l-9.209 5.302V39.25c0 .286-.152.55-.4.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.801.801 0 0 1 0 39.25V6.334c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216l17.62-10.144zM1.602 7.719v31.068L19.22 48.93v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-.002-21.481L4.965 9.654 1.602 7.72zm8.81-5.994L2.405 6.334l8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764l4.645-2.674V7.719l-3.363 1.936-4.646 2.675v20.096l3.364-1.937zM39.243 7.164l-8.006 4.609 8.006 4.609 8.005-4.61-8.005-4.608zm-.801 10.605l-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937v-9.124zM20.02 38.33l11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833 7.993 4.524z" />
                            </svg>
                        </a>
                        <!-- MailTrap -->
                        <a href="https://mailtrap.io/">
                            <svg class="h-8 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600" viewBox="0 0 112 34" fill="currentColor" class="h-8 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600"><path d="M5.646 24.27l-2.808 1.666c-.38.25-.207.68 0 .767l10.904 6.11c.644.36 1.437.36 2.081 0l11.048-6.19c.335-.199.28-.602 0-.738l-2.968-1.604c-.25-.165-.81-.11-1.008.025l-7.072 3.962c-.644.361-1.437.361-2.081 0l-7.135-3.997c-.266-.164-.687-.155-.961 0z" fill="currentColor"></path><path d="M13.743.27a2.137 2.137 0 012.082 0l8.78 4.92c.35.178.382.654 0 .869l-1.746.974a2.999 2.999 0 01-2.927-.004l-4.107-2.301a2.137 2.137 0 00-2.082 0L9.631 7.032c-.91.51-2.019.51-2.93.003l-1.813-1.01c-.325-.14-.393-.554 0-.793L13.743.271z" fill="currentColor"></path><path d="M28.525 7.676a2.01 2.01 0 011.04 1.75v14.232c0 .705-.44.836-.911.59l-3.252-1.755v-9.569l-9.579 5.367c-.643.361-1.437.361-2.081 0l-9.579-5.367v9.568L1.21 24.246C.857 24.47 0 24.541 0 23.658V9.425a2.01 2.01 0 011.04-1.75c1.037-.542 2.108 0 2.108 0l11.635 6.534 11.616-6.533s1.032-.622 2.126 0z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M70.4 6.558a1.415 1.415 0 100 2.83 1.415 1.415 0 000-2.83zm3.617 0a.14.14 0 00-.14.14v13.895c0 .077.063.14.14.14h2.15a.14.14 0 00.139-.14V6.698a.14.14 0 00-.14-.14h-2.149zm4.761 0a.14.14 0 00-.14.14v13.895c0 .077.063.14.14.14h2.149a.14.14 0 00.14-.14v-7.414h2.173a.14.14 0 00.14-.14v-2.056a.14.14 0 00-.14-.14h-2.173V6.699a.14.14 0 00-.14-.14h-2.149zM45.18 10.42a4.289 4.289 0 00-4.288 4.289v5.884c0 .077.062.14.14.14h2.148a.14.14 0 00.14-.14v-5.884a1.86 1.86 0 113.721 0v5.884c0 .077.063.14.14.14h2.149a.14.14 0 00.14-.14v-5.884a1.86 1.86 0 113.721 0v5.884c0 .077.063.14.14.14h2.149a.14.14 0 00.14-.14v-5.884a4.289 4.289 0 00-7.364-2.99 4.277 4.277 0 00-3.075-1.3zm16.809 0a5.205 5.205 0 00-5.206 5.205v.217a5.205 5.205 0 005.206 5.205c1.032 0 1.981-.362 2.776-.933v.479c0 .077.063.14.14.14h2.149a.14.14 0 00.14-.14v-4.968a5.205 5.205 0 00-5.206-5.205zm32.595 0a5.205 5.205 0 00-5.205 5.205v.217a5.205 5.205 0 005.205 5.205c1.012 0 2.011-.451 2.777-1.03v.576c0 .077.062.14.14.14h2.148a.14.14 0 00.14-.14v-4.968a5.205 5.205 0 00-5.205-5.205zm12.211 0a5.205 5.205 0 00-5.205 5.205v9.066c0 .077.062.14.139.14h2.149a.14.14 0 00.14-.14v-4.446A5.205 5.205 0 00112 15.842v-.217a5.205 5.205 0 00-5.205-5.205zm-18.154.343a4.625 4.625 0 00-4.625 4.626v5.204c0 .077.062.14.14.14h2.148a.14.14 0 00.14-.14v-5.204c0-1.214.984-2.197 2.197-2.197a.14.14 0 00.14-.14v-2.149a.14.14 0 00-.14-.14zm-19.291.08a.14.14 0 00-.14.14v9.61c0 .077.062.14.14.14h2.149a.14.14 0 00.14-.14v-9.61a.14.14 0 00-.14-.14h-2.15zm-10.138 4.782a2.777 2.777 0 015.553 0v.217a2.777 2.777 0 11-5.553 0v-.217zm32.595 0a2.777 2.777 0 115.554 0v.217a2.777 2.777 0 01-5.554 0v-.217zm12.211 0a2.777 2.777 0 115.554 0v.217a2.777 2.777 0 01-5.554 0v-.217z" fill="currentColor"></path><path d="M43.124 30.13c.967 0 1.783-.728 1.783-1.949 0-1.22-.816-1.95-1.783-1.95-.602 0-1.006.262-1.236.659h-.016v-2.425h-.776v5.547h.776v-.539h.016c.23.396.634.658 1.236.658zm-.166-.76c-.681 0-1.125-.491-1.125-1.189 0-.697.444-1.188 1.125-1.188.682 0 1.125.49 1.125 1.188s-.443 1.189-1.125 1.189zM48.293 26.35l-.975 2.402-1.006-2.401h-.928l1.538 3.328-.88 1.918h.824l2.283-5.246h-.856zM54.422 26.24h-.056c-.618 0-1.038.364-1.212.911h-.016v-.8h-.777v3.66h.777v-1.624c0-.871.404-1.236 1.165-1.236h.119v-.911zM56.72 30.13c.603 0 1.007-.26 1.237-.657h.016v.539h.776V26.35h-.776v.539h-.016c-.23-.397-.634-.658-1.236-.658-.967 0-1.784.729-1.784 1.95 0 1.22.817 1.949 1.784 1.949zm.167-.76c-.682 0-1.125-.491-1.125-1.189 0-.697.443-1.188 1.125-1.188.681 0 1.125.49 1.125 1.188s-.444 1.189-1.125 1.189zM60.804 24.544h-.95v.95h.95v-.95zm-.864 5.468h.777V26.35h-.777v3.66zM62.718 24.465h-.776v5.547h.776v-5.547zM65.037 30.13c.855 0 1.426-.364 1.426-1.109 0-.491-.254-.808-.73-1.03l-.68-.325c-.318-.15-.42-.261-.42-.436 0-.166.11-.277.451-.277.357 0 .697.119.975.238l.317-.674a3.214 3.214 0 00-1.268-.285c-.8 0-1.3.364-1.3 1.038 0 .42.214.792.769 1.054l.666.325c.309.15.388.261.388.412 0 .23-.198.34-.57.34-.437 0-.825-.15-1.166-.348l-.348.69c.42.245.966.388 1.49.388zM71.64 26.35l-.737 2.64-.848-2.64h-.752l-.848 2.64-.737-2.64h-.856l1.228 3.662h.713l.88-2.623.872 2.623h.713l1.228-3.661h-.856zM74.752 30.13c.603 0 1.007-.26 1.237-.657h.016v.539h.776V26.35h-.776v.539h-.016c-.23-.397-.634-.658-1.237-.658-.966 0-1.783.729-1.783 1.95 0 1.22.817 1.949 1.784 1.949zm.167-.76c-.682 0-1.125-.491-1.125-1.189 0-.697.443-1.188 1.125-1.188.681 0 1.125.49 1.125 1.188S75.6 29.37 74.92 29.37zM79.993 26.24h-.055c-.619 0-1.039.364-1.213.911h-.016v-.8h-.776v3.66h.776v-1.624c0-.871.404-1.236 1.165-1.236h.119v-.911zM82.379 26.232c-1.173 0-1.87.848-1.87 1.957 0 1.157.745 1.942 1.91 1.942.903 0 1.386-.5 1.656-.872l-.547-.515c-.182.246-.523.642-1.125.642-.626 0-1.078-.428-1.11-1.078h2.837v-.127c0-1.18-.634-1.95-1.751-1.95zm-.047.713c.554 0 .927.293.958.8h-1.957c.095-.53.475-.8.999-.8z" fill="currentColor"></path></svg>
                        </a>
                        <!-- Multi-Tenancy Laravel -->
                        <a href="https://github.com/archtechx/tenancy">
                            <svg  class="h-8 mr-4 text-gray-500 duration-150 cursor-pointer fill-current transition-color hover:text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1439 500" fill="#FFF">
                                <path d="M217.624 21.1185C220.099 19.6895 223.149 19.6895 225.624 21.1185L417.845 132.095C420.32 133.524 421.845 136.165 421.845 139.023V360.977C421.845 363.835 420.32 366.476 417.845 367.905L225.624 478.881C223.149 480.31 220.099 480.31 217.624 478.881L25.4028 367.905C22.9275 366.476 21.4027 363.835 21.4027 360.977V139.023C21.4027 136.165 22.9275 133.524 25.4028 132.095L217.624 21.1185Z" fill="currentColor" stroke="currentColor" stroke-width="28"/>
                                <path d="M217.624 91.3609C220.099 89.9319 223.149 89.9318 225.624 91.3609L357.012 167.216C359.487 168.645 361.012 171.286 361.012 174.145V325.855C361.012 328.714 359.487 331.355 357.012 332.784L225.624 408.639C223.149 410.068 220.099 410.068 217.624 408.639L86.2356 332.784C83.7604 331.355 82.2355 328.714 82.2355 325.855V174.145C82.2355 171.286 83.7604 168.645 86.2356 167.216L217.624 91.3609Z" fill="currentColor" stroke="#FFF" stroke-width="28"/>
                                <path d="M95.8793 177.326L221.556 251.612M221.556 251.612L347.061 177.562M221.556 251.612V397.656" stroke="#FFF" stroke-width="28" stroke-linejoin="round"/>
                                <path d="M541.93 401H553.924V377.567H576.997V367.678H553.924V354.161H579.49V344.273H541.93V401ZM638.127 372.636C638.127 354.078 626.604 343.497 611.563 343.497C596.44 343.497 585 354.078 585 372.636C585 391.112 596.44 401.776 611.563 401.776C626.604 401.776 638.127 391.195 638.127 372.636ZM625.967 372.636C625.967 384.658 620.261 391.167 611.563 391.167C602.838 391.167 597.16 384.658 597.16 372.636C597.16 360.615 602.838 354.106 611.563 354.106C620.261 354.106 625.967 360.615 625.967 372.636ZM645.451 401H657.445V380.891H666.197L676.945 401H690.185L678.136 378.952C684.59 376.182 688.163 370.559 688.163 362.803C688.163 351.53 680.712 344.273 667.832 344.273H645.451V401ZM657.445 371.251V354.078H665.533C672.457 354.078 675.809 357.153 675.809 362.803C675.809 368.426 672.457 371.251 665.588 371.251H657.445ZM711.571 401H747.884V391.112H723.565V344.273H711.571V401ZM765.492 401L769.702 388.065H790.172L794.382 401H807.234L787.679 344.273H772.223L752.64 401H765.492ZM772.749 378.702L779.729 357.236H780.172L787.153 378.702H772.749ZM812.502 401H824.496V380.891H833.249L843.996 401H857.236L845.187 378.952C851.641 376.182 855.214 370.559 855.214 362.803C855.214 351.53 847.763 344.273 834.883 344.273H812.502V401ZM824.496 371.251V354.078H832.584C839.508 354.078 842.86 357.153 842.86 362.803C842.86 368.426 839.508 371.251 832.639 371.251H824.496ZM871.907 401L876.117 388.065H896.587L900.797 401H913.649L894.094 344.273H878.638L859.055 401H871.907ZM879.164 378.702L886.144 357.236H886.588L893.568 378.702H879.164ZM919.026 344.273H905.703L925.286 401H940.742L960.297 344.273H947.002L933.263 387.372H932.737L919.026 344.273ZM965.565 401H1003.9V391.112H977.558V377.567H1001.82V367.678H977.558V354.161H1003.79V344.273H965.565V401ZM1011.76 401H1048.08V391.112H1023.76V344.273H1011.76V401Z" fill="currentColor"/>
                                <path d="M611.75 272.25C620.083 272.75 624.25 276.5 624.25 283.5C624.25 287.5 622.583 290.583 619.25 292.75C616.083 294.75 611.5 295.583 605.5 295.25L598.75 294.75C570.75 292.75 556.75 277.75 556.75 249.75V195.25H544.25C539.75 195.25 536.25 194.25 533.75 192.25C531.417 190.25 530.25 187.333 530.25 183.5C530.25 179.667 531.417 176.75 533.75 174.75C536.25 172.75 539.75 171.75 544.25 171.75H556.75V148.75C556.75 144.25 558.167 140.667 561 138C563.833 135.333 567.667 134 572.5 134C577.167 134 580.917 135.333 583.75 138C586.583 140.667 588 144.25 588 148.75V171.75H609.25C613.75 171.75 617.167 172.75 619.5 174.75C622 176.75 623.25 179.667 623.25 183.5C623.25 187.333 622 190.25 619.5 192.25C617.167 194.25 613.75 195.25 609.25 195.25H588V252C588 264.333 593.667 270.917 605 271.75L611.75 272.25ZM737.285 260.5C740.118 260.5 742.368 261.583 744.035 263.75C745.868 265.917 746.785 268.833 746.785 272.5C746.785 277.667 743.702 282 737.535 285.5C731.868 288.667 725.452 291.25 718.285 293.25C711.118 295.083 704.285 296 697.785 296C678.118 296 662.535 290.333 651.035 279C639.535 267.667 633.785 252.167 633.785 232.5C633.785 220 636.285 208.917 641.285 199.25C646.285 189.583 653.285 182.083 662.285 176.75C671.452 171.417 681.785 168.75 693.285 168.75C704.285 168.75 713.868 171.167 722.035 176C730.202 180.833 736.535 187.667 741.035 196.5C745.535 205.333 747.785 215.75 747.785 227.75C747.785 234.917 744.618 238.5 738.285 238.5H664.535C665.535 250 668.785 258.5 674.285 264C679.785 269.333 687.785 272 698.285 272C703.618 272 708.285 271.333 712.285 270C716.452 268.667 721.118 266.833 726.285 264.5C731.285 261.833 734.952 260.5 737.285 260.5ZM694.035 190.75C685.535 190.75 678.702 193.417 673.535 198.75C668.535 204.083 665.535 211.75 664.535 221.75H721.035C720.702 211.583 718.202 203.917 713.535 198.75C708.868 193.417 702.368 190.75 694.035 190.75ZM844.348 168.75C859.014 168.75 869.931 172.917 877.098 181.25C884.264 189.583 887.848 202.167 887.848 219V280.5C887.848 285.167 886.431 288.833 883.598 291.5C880.931 294.167 877.181 295.5 872.348 295.5C867.514 295.5 863.681 294.167 860.848 291.5C858.014 288.833 856.598 285.167 856.598 280.5V220.75C856.598 211.25 854.764 204.333 851.098 200C847.598 195.667 842.014 193.5 834.348 193.5C825.348 193.5 818.098 196.333 812.598 202C807.264 207.667 804.598 215.25 804.598 224.75V280.5C804.598 285.167 803.181 288.833 800.348 291.5C797.514 294.167 793.681 295.5 788.848 295.5C784.014 295.5 780.181 294.167 777.348 291.5C774.681 288.833 773.348 285.167 773.348 280.5V183.75C773.348 179.417 774.764 175.917 777.598 173.25C780.431 170.583 784.264 169.25 789.098 169.25C793.431 169.25 796.931 170.583 799.598 173.25C802.431 175.75 803.848 179.083 803.848 183.25V190C808.014 183.167 813.598 177.917 820.598 174.25C827.598 170.583 835.514 168.75 844.348 168.75ZM972.588 168.75C989.588 168.75 1002.17 173 1010.34 181.5C1018.67 189.833 1022.84 202.583 1022.84 219.75V280.75C1022.84 285.25 1021.5 288.833 1018.84 291.5C1016.17 294 1012.5 295.25 1007.84 295.25C1003.5 295.25 999.921 293.917 997.088 291.25C994.421 288.583 993.088 285.083 993.088 280.75V275.25C990.255 281.75 985.755 286.833 979.588 290.5C973.588 294.167 966.588 296 958.588 296C950.421 296 943.005 294.333 936.338 291C929.671 287.667 924.421 283.083 920.588 277.25C916.755 271.417 914.838 264.917 914.838 257.75C914.838 248.75 917.088 241.667 921.588 236.5C926.255 231.333 933.755 227.583 944.088 225.25C954.421 222.917 968.671 221.75 986.838 221.75H993.088V216C993.088 207.833 991.338 201.917 987.838 198.25C984.338 194.417 978.671 192.5 970.838 192.5C966.005 192.5 961.088 193.25 956.088 194.75C951.088 196.083 945.171 198.083 938.338 200.75C934.005 202.917 930.838 204 928.838 204C925.838 204 923.338 202.917 921.338 200.75C919.505 198.583 918.588 195.75 918.588 192.25C918.588 189.417 919.255 187 920.588 185C922.088 182.833 924.505 180.833 927.838 179C933.671 175.833 940.588 173.333 948.588 171.5C956.755 169.667 964.755 168.75 972.588 168.75ZM964.838 273.5C973.171 273.5 979.921 270.75 985.088 265.25C990.421 259.583 993.088 252.333 993.088 243.5V238.25H988.588C977.421 238.25 968.755 238.75 962.588 239.75C956.421 240.75 952.005 242.5 949.338 245C946.671 247.5 945.338 250.917 945.338 255.25C945.338 260.583 947.171 265 950.838 268.5C954.671 271.833 959.338 273.5 964.838 273.5ZM1125.6 168.75C1140.26 168.75 1151.18 172.917 1158.35 181.25C1165.51 189.583 1169.1 202.167 1169.1 219V280.5C1169.1 285.167 1167.68 288.833 1164.85 291.5C1162.18 294.167 1158.43 295.5 1153.6 295.5C1148.76 295.5 1144.93 294.167 1142.1 291.5C1139.26 288.833 1137.85 285.167 1137.85 280.5V220.75C1137.85 211.25 1136.01 204.333 1132.35 200C1128.85 195.667 1123.26 193.5 1115.6 193.5C1106.6 193.5 1099.35 196.333 1093.85 202C1088.51 207.667 1085.85 215.25 1085.85 224.75V280.5C1085.85 285.167 1084.43 288.833 1081.6 291.5C1078.76 294.167 1074.93 295.5 1070.1 295.5C1065.26 295.5 1061.43 294.167 1058.6 291.5C1055.93 288.833 1054.6 285.167 1054.6 280.5V183.75C1054.6 179.417 1056.01 175.917 1058.85 173.25C1061.68 170.583 1065.51 169.25 1070.35 169.25C1074.68 169.25 1078.18 170.583 1080.85 173.25C1083.68 175.75 1085.1 179.083 1085.1 183.25V190C1089.26 183.167 1094.85 177.917 1101.85 174.25C1108.85 170.583 1116.76 168.75 1125.6 168.75ZM1255.09 296C1242.92 296 1232.17 293.417 1222.84 288.25C1213.67 283.083 1206.59 275.75 1201.59 266.25C1196.59 256.75 1194.09 245.667 1194.09 233C1194.09 220.333 1196.67 209.167 1201.84 199.5C1207.17 189.667 1214.59 182.083 1224.09 176.75C1233.59 171.417 1244.5 168.75 1256.84 168.75C1263.34 168.75 1269.84 169.667 1276.34 171.5C1283 173.333 1288.84 175.833 1293.84 179C1299.17 182.5 1301.84 186.917 1301.84 192.25C1301.84 195.917 1300.92 198.917 1299.09 201.25C1297.42 203.417 1295.17 204.5 1292.34 204.5C1290.5 204.5 1288.59 204.083 1286.59 203.25C1284.59 202.417 1282.59 201.417 1280.59 200.25C1276.92 198.083 1273.42 196.417 1270.09 195.25C1266.75 193.917 1262.92 193.25 1258.59 193.25C1248.25 193.25 1240.25 196.667 1234.59 203.5C1229.09 210.167 1226.34 219.833 1226.34 232.5C1226.34 245 1229.09 254.667 1234.59 261.5C1240.25 268.167 1248.25 271.5 1258.59 271.5C1262.75 271.5 1266.42 270.917 1269.59 269.75C1272.92 268.417 1276.59 266.667 1280.59 264.5C1283.09 263 1285.25 261.917 1287.09 261.25C1288.92 260.417 1290.75 260 1292.59 260C1295.25 260 1297.5 261.167 1299.34 263.5C1301.17 265.833 1302.09 268.75 1302.09 272.25C1302.09 275.083 1301.42 277.583 1300.09 279.75C1298.92 281.75 1296.92 283.583 1294.09 285.25C1288.92 288.583 1282.92 291.25 1276.09 293.25C1269.25 295.083 1262.25 296 1255.09 296ZM1408.16 178.25C1409.49 175.25 1411.24 173.083 1413.41 171.75C1415.74 170.25 1418.24 169.5 1420.91 169.5C1424.74 169.5 1428.16 170.833 1431.16 173.5C1434.32 176 1435.91 179.167 1435.91 183C1435.91 184.833 1435.41 186.75 1434.41 188.75L1366.16 331.75C1363.32 337.417 1358.91 340.25 1352.91 340.25C1349.07 340.25 1345.66 339 1342.66 336.5C1339.82 334.167 1338.41 331.167 1338.41 327.5C1338.41 325.667 1338.91 323.583 1339.91 321.25L1356.91 285.5L1310.41 188.75C1309.57 187.083 1309.16 185.167 1309.16 183C1309.16 179.167 1310.74 175.917 1313.91 173.25C1317.24 170.583 1320.99 169.25 1325.16 169.25C1327.99 169.25 1330.57 170 1332.91 171.5C1335.24 172.833 1337.07 175 1338.41 178L1373.41 255.25L1408.16 178.25Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div id='#home'  class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 lg:pl-10">
                <div class="container relative left-0 w-full max-w-4xl lg:absolute lg:w-screen">
                    <div x-data="{ open: false }">
                        <button @click="open = true" class="bg-indigo-500  w-14 h-14 rounded-full flex items-center justify-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out z-50">
                            <svg class="w-5 h-5 ml-1" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z" fill="#FFF"/>
                            </svg>
                        </button>
                        <div class="lg:-mx-56">
                        <iframe class="absolute lg:-mx-56  z-50 w-full h-full lg:w-full lg:pl-full" x-show="open" @click.away="open = false"  src="https://www.youtube.com/embed/qTIEENQzHZo" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <img  x-data="{ open: false }" src="img/homeinicio.png" class="w-full h-auto mt-20 mb-20 ml-0 shadow-2xl rounded-xl lg:mb-0 lg:h-full xl:-ml-12">
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Section 2 -->
    <section id="#features" class="py-20 bg-white">
    <div class="flex flex-col px-8 mx-auto space-y-12 max-w-7xl xl:px-12">
        <div class="relative">
            <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">Perfect for your next big idea.</h2>
            <p class="w-full py-8 mx-auto -mt-2 text-lg text-center text-gray-700 intro sm:max-w-3xl">Forget all the hard work and focus on what matters to your business, it will help you quickly build your SaaS application. </p>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-7/12 sm:order-last">

                <img data-aos="fade-right" class="rounded-lg shadow-xl" src="img/telaplan.png" alt="">


            </div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase">Backend</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Code Made Easy</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left">The code was written in a simple way so that everyone can absorb the most of it. Focused exclusively on taking the first steps in a simple way and without much headache.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12">
                <img data-aos="fade-left" class="rounded-lg shadow-xl" src="img/register-section.png" alt="">
            </div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pl-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase">about the system</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Multi-Tenancy Model</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left">
                    Multi-tenancy model, in this model each client has its own database or database. This scenario allows more security in the separation of data and makes it possible to more easily perform specific tests for each client. Exporting the data of a given lieutenant also becomes a much simpler task.</p>
            </div>
        </div>
        <div class="flex flex-col mb-8 animated fadeIn sm:flex-row">
            <div class="flex items-center mb-8 sm:w-1/2 md:w-5/12 sm:order-last">
                <img data-aos="fade-right" class="rounded-lg shadow-xl" src="img/checkout.png" alt="">
            </div>
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase">Frontend</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Easy to customize</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left">All models and components are fully customizable. It's easier for you to create your apps your way.
                    PuroSaas is using Laravel Breeze  designed with Tailwind CSS. Written in clean PHP code, based on the latest Laravel 9 version.</p>
            </div>
        </div>

    </div>
</section>

<div class="container px-4 lg:px-8 mx-auto max-w-screen-xl text-gray-700  overflow-x-hidden">

    <!-- Section 3 -->
    <div class=" p-6 md:flex mt-40 md:space-x-10 items-start">
        <div data-aos="fade-down" class="md:w-7/12 relative ">
            <div x-data="{ open: false }" class=" ">
                <button @click="open = true"  class="bg-blue-400 w-14 h-14 z-50 rounded-full flex items-center justify-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 focus:outline-none transform transition hover:scale-110 duration-300 ease-in-out z-50">
                        <svg class="w-5 h-5 ml-1" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.5751 12.8097C23.2212 13.1983 23.2212 14.135 22.5751 14.5236L1.51538 27.1891C0.848878 27.5899 5.91205e-07 27.1099 6.25202e-07 26.3321L1.73245e-06 1.00123C1.76645e-06 0.223477 0.848877 -0.256572 1.51538 0.14427L22.5751 12.8097Z" fill="#FFF"/>
                        </svg>
                    </button>
                <div class="lg:mx-48">
                    <iframe class="absolute lg:mx-48 z-50 w-full h-full lg:w-full lg:pl-full" x-show="open" @click.away="open = false"  src="https://www.youtube.com/embed/qTIEENQzHZo" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <img class="rounded-xl z-40 shadow-xl relative" src="img/lo.png" alt="demo">
            <div style="background: #23BDEE;" class="floating w-24 h-24 absolute rounded-lg z-0 -top-3 -left-3"></div>
            <div class="bg-yellow-500 w-40 h-40 floating absolute rounded-lg z-10 -bottom-3 -right-3"></div>
        </div>
        <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pl-16">
            <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase">demo movie</p>
            <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Check out Some of the Features</h3>
            <p class="mt-5 text-lg text-gray-700 text md:text-left">Check out this video a little about the system is able to do for you.</p>

        </div>
    </div>

    <!-- Section 4 -->
    <section >
        <div class="px-3 mt-32 sm:px-5">
            <div class="max-w-5xl mx-auto">

                <div class="text-center mb-16">
                    <h1 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">
                        Get unlimited access for
                        <span class="text-6xl md:text-4xl text-gray-400 line-through">$97</span> <span class="relative">$69 <span class="hidden lg:block absolute left-0 bottom-full text-xs font-bold text-white bg-green-500 py-1 px-2 rounded uppercase transform rotate-3 tracking-normal mb-3 ml-4" style="min-width: 150px;">Limited time offer<svg class="absolute top-full fill-current text-green-500" width="8" height="6" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h8v6z"></path></svg></span></span></h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-xl text-gray-600 mb-6">
                            Buy now and get instant access and lifetime updates.</p>
                    </div>
                </div>
                <div class="max-w-xs mx-auto">

                    <div class="mt-8">
                        <a href="" class=" btn text-white bg-indigo-500 hover:bg-indigo-600 w-full hover:shadow-xl">
                            Purchase - $69
                        </a>

                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Section 5 -->
    <section class="p-6">
        <div class="flex flex-col md:flex-row items-center md:space-x-10 mt-16">
            <div class="flex flex-col justify-center mt-5 mb-8 md:mt-0 sm:w-1/2 md:w-7/12 sm:pr-16">
                <p class="mb-2 text-sm font-semibold leading-none text-left text-indigo-600 uppercase">Still having doubts?</p>
                <h3 class="mt-2 text-2xl sm:text-left md:text-4xl">Contact us</h3>
                <p class="mt-5 text-lg text-gray-700 text md:text-left">If you have doubts about something we can provide a service to take all your doubts. And you can also check our FAQ for frequently asked questions.
                    <a class="text-indigo-600" href="#faq">click here</a></p>
            </div>
            <img data-aos="fade-left" class="md:w-1/2" src="img/girl-with-books.png">
        </div>
    </section>

    <!-- Section 6 -->
    <section id="faq" class="py-16 bg-white md:py-20 lg:py-24">
        <div class="max-w-5xl px-12 mx-auto xl:px-0">
            <h2 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">Frequently Asked Questions</h2>
            <p class="mt-4 text-xl font-thin text-center text-gray-700 lg:text-2xl">Here are some of the most common frequently asked questions</p>
            <div class="relative mt-12 space-y-3">

                <!-- Question 1 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>What is the configuration of PuroSaaS?</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">
                        Laravel 9 latest version. Multi-database tenancy. Customers are given subdomains by default. Billing is done with Cashier Stripe, the front end is done with Tailwind CSS. </p>
                </div>

                <!-- Question 2 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>Will there be any kind of support after the purchase?</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">
                        Yes. There are two types of support we offer. After purchase, you will receive an email from support.</p>
                </div>

                <!-- Question 3 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>Will I be able to migrate my existing software with this code?</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">
                        Yes. We focus on simplicity so that the final developer doesn't have headaches when it comes to implementing them in their daily lives.</p>
                </div>

                <!-- Question 4 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>Support other payment providers?</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">
                        At the moment only cashier stripe.</p>
                </div>

                <!-- Question 5 -->
                <div x-data="{ show: false }" class="relative overflow-hidden border-b border-gray-100 select-none">
                    <h4 @click="show=!show" class="flex items-center justify-between px-2 text-lg font-medium text-gray-700 cursor-pointer sm:text-xl md:text-2xl py-7 hover:text-gray-900">
                        <span>Do you have an installation document?</span>
                        <svg class="w-6 h-6 mr-2 transition-all duration-200 ease-out transform rotate-0" :class="{ '-rotate-180' : show }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </h4>
                    <p class="px-2 pt-0 -mt-2 text-gray-400 sm:text-lg py-7" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform -translate-y-0" x-transition:leave="transition-all ease-in duration-300" x-transition:leave-start="opacity-100 transform -translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" x-show="show" x-cloak="">
                        Yes. After purchase we will send you the documents for installation on your machine.</p></div>

            </div>

        </div>
    </section>

    <!-- Section 7 -->
    <section id="price">
        <div class="px-3 sm:px-5">
            <div class="max-w-5xl mx-auto">

                <div class="text-center mb-16">
                    <h1 class="w-full text-3xl font-bold text-center sm:text-4xl md:text-5xl">
                        Get unlimited access for
                        <span class="text-6xl md:text-4xl text-gray-400 line-through">$97</span> <span class="relative">$69 <span class="hidden lg:block absolute left-0 bottom-full text-xs font-bold text-white bg-green-500 py-1 px-2 rounded uppercase transform rotate-3 tracking-normal mb-3 ml-4" style="min-width: 150px;">Limited time offer<svg class="absolute top-full fill-current text-green-500" width="8" height="6" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h8v6z"></path></svg></span></span></h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-xl text-gray-600 mb-6">
                            Buy now and get instant access and lifetime updates.</p>
                    </div>
                </div>
                <div class="max-w-xs mx-auto">

                    <div class="mt-8">
                        <a href="https://purosaas.gumroad.com/l/nagld" class=" btn text-white text-center font-bold bg-indigo-500 hover:bg-indigo-600 w-full hover:shadow-xl">
                            Buy Now - $39
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- Section 8 -->
    <section class="text-gray-700 bg-white body-font">
        <div class="container flex flex-col items-center px-8 py-8 mx-auto max-w-7xl sm:flex-row">
            <a href="" class="text-xl font-black leading-none text-gray-900 select-none logo">{{env('APP_NAME')}}<span class="text-indigo-600">.</span></a>
            <p class="mt-4 text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l sm:border-gray-200 sm:mt-0">© 2022 {{env('APP_NAME')}}
            </p>
        </div>
    </section>

</div>
