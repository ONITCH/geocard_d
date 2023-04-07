<nav class="mx-auto flex w-full justify-between gap-8 border-t border-gray-800 bg-black px-10 py-4 text-xs sm:max-w-md sm:rounded-t-xl sm:border-transparent sm:text-sm
    style="height:
    75px ;background-color: rgb(0, 0, 0)">
    <span>&nbsp;</span>
    <a href="{{ route('dashboard') }}"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 {{ request()->routeIs('dashboard') ? 'active text-gray-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
            <g>
                <polygon
                    points="442.531,218 344.828,120.297 256,31.469 167.172,120.297 69.438,218.047 0,287.469 39.984,327.453 
                109.406,258.031 207.156,160.281 256,111.438 304.844,160.281 402.531,257.984 472.016,327.453 512,287.469"
                    style="fill: rgb(120, 120, 120);" />
                <polygon
                    points="85.719,330.375 85.719,480.531 274.75,480.531 274.75,361.547 343.578,361.547 343.578,480.531 
                426.281,480.531 426.281,330.328 256.016,160.063"
                    style="fill: rgb(120, 120, 120);" />
            </g>
        </svg>
        <span>{{ __('home') }}</span>
    </a>
    {{-- <span>QR Code</span> --}}


    <a href="{{ route('find.index') }}" style="margin-right: 2px; margin-left: 2px;"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 {{ request()->routeIs('find.index') ? 'active text-gray-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
            <g>
                <path class="st0"
                    d="M510.868,327.816c-0.61-4.281-1.471-8.474-2.528-12.572l0.733-0.095c0,0-42.276-112.08-51.077-151.655
		c-7.37-29.951-28.899-53.445-56.26-64.216c-0.697-2.495-1.275-4.744-1.706-6.664c-5.963-24.275-29.473-40.554-54.752-36.975
		c-25.276,3.58-43.345,25.75-42.336,50.727c0.203,3.229,0.466,7.382,0.765,12.102c-18.842,17.961-29.939,43.56-28.831,70.96
		c0.047,0.765,0.096,1.546,0.143,2.359h-38.042c0.047-0.813,0.095-1.594,0.148-2.359c1.104-27.401-9.986-52.999-28.836-70.96
		c0.299-4.719,0.563-8.873,0.766-12.102c1.008-24.977-17.057-47.147-42.337-50.727c-25.276-3.58-48.789,12.7-54.752,36.975
		c-0.43,1.921-1.008,4.169-1.706,6.664c-27.36,10.77-48.889,34.265-56.26,64.216C45.199,203.069,2.923,315.149,2.923,315.149
		l0.733,0.095c-1.056,4.098-1.917,8.291-2.523,12.572c-8.765,61.872,34.296,119.143,96.168,127.905
		c61.872,8.761,119.14-34.296,127.901-96.168c0.606-4.289,0.94-8.546,1.064-12.779l0.733,0.112c0,0,0.195-3.029,0.538-8.267h56.922
		c0.343,5.238,0.538,8.267,0.538,8.267l0.734-0.112c0.124,4.233,0.458,8.49,1.064,12.779
		c8.762,61.872,66.029,104.929,127.901,96.168C476.576,446.96,519.629,389.688,510.868,327.816z M187.861,354.268
		c-5.848,41.24-44.022,69.955-85.274,64.112c-41.248-5.844-69.952-44.031-64.108-85.27c5.84-41.248,44.018-69.956,85.266-64.113
		C164.996,274.842,193.7,313.012,187.861,354.268z M409.41,418.38c-41.252,5.843-79.426-22.872-85.274-64.112
		c-5.839-41.256,22.864-79.426,64.116-85.271c41.252-5.843,79.426,22.864,85.267,64.113
		C479.362,374.35,450.658,412.537,409.41,418.38z"
                    style="fill: rgb(120, 120, 120);"></path>
            </g>
        </svg>
        <span>{{ __('search') }}</span>
    </a>


    {{-- <x-nav-link :href="route('find.index')" :active="request()->routeIs('find.index')"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 ">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd"
                d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z"
                clip-rule="evenodd" />
        </svg>
        &nbsp;{{ __('explore') }}
    </x-nav-link> --}}
    {{-- <span>Find</span> --}}
    {{-- </a> --}}


    <a href="{{ route('feed.timeline') }}"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 {{ request()->routeIs('feed.timeline') ? 'active text-gray-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
            <g>
                <path class="st0"
                    d="M286.105,88.898c-100.217,0.008-181.43,81.222-181.438,181.438c0.008,100.225,81.222,181.438,181.438,181.446
		c100.225-0.008,181.439-81.222,181.446-181.446C467.544,170.119,386.33,88.906,286.105,88.898z M179.43,163.661
		c10.19-10.181,21.832-18.91,34.562-25.85c-6.736,10.316-12.612,21.932-17.518,34.646h-25.04
		C174.01,169.444,176.627,166.463,179.43,163.661z M153.741,197.944h34.714c-4.795,18.48-7.623,38.589-8.501,59.644h-44.06
		C137.7,236.103,143.897,215.901,153.741,197.944z M153.757,342.736c-9.86-17.966-16.057-38.168-17.864-59.661h43.883
		c0.877,21.106,3.849,41.164,8.661,59.661H153.757z M179.43,377.01c-2.802-2.802-5.419-5.774-7.986-8.788h25.04
		c3.554,9.219,7.581,17.888,12.089,25.875c1.748,3.072,3.614,5.951,5.496,8.814C201.295,395.963,189.645,387.225,179.43,377.01z
		 M273.366,420.555c-1.266-0.101-2.542-0.16-3.808-0.304c-4.153-1.706-8.282-3.96-12.393-7.024
		c-12.333-9.16-24.043-24.752-33.109-45.005h49.31V420.555z M273.366,342.736h-58.445c-5.26-18-8.518-38.184-9.481-59.661h67.926
		V342.736z M273.366,257.588h-68.112c0.963-21.468,4.34-41.644,9.582-59.644h58.53V257.588z M273.366,172.458h-49.243
		c2.094-4.677,4.28-9.176,6.644-13.339c7.801-13.837,16.944-24.617,26.398-31.674c4.112-3.057,8.24-5.302,12.385-7.008
		c1.266-0.143,2.55-0.202,3.816-0.312V172.458z M418.478,197.944c9.844,17.957,16.04,38.159,17.846,59.644h-43.89
		c-0.878-21.097-3.85-41.146-8.662-59.644H418.478z M392.788,163.661c2.803,2.802,5.42,5.783,7.995,8.797h-25.056
		c-3.546-9.219-7.582-17.889-12.098-25.884c-1.739-3.064-3.613-5.943-5.479-8.814C370.906,144.716,382.565,153.454,392.788,163.661z
		 M298.844,120.125c1.266,0.11,2.549,0.169,3.816,0.312c4.136,1.706,8.274,3.951,12.384,7.008
		c12.343,9.159,24.044,24.769,33.119,45.013h-49.319V120.125z M298.844,197.944h58.453c5.252,17.999,8.51,38.184,9.472,59.644
		h-67.925V197.944z M341.451,381.552c-7.809,13.837-16.952,24.626-26.407,31.675c-4.11,3.064-8.248,5.318-12.393,7.024
		c-1.266,0.144-2.541,0.202-3.807,0.304v-52.333h49.252C345.993,372.89,343.816,377.399,341.451,381.552z M298.844,342.736v-59.661
		h68.111c-0.962,21.477-4.339,41.662-9.582,59.661H298.844z M392.788,377.01c-10.19,10.198-21.831,18.919-34.562,25.85
		c6.728-10.307,12.604-21.924,17.509-34.638h25.038C398.208,371.236,395.591,374.208,392.788,377.01z M418.46,342.736h-34.705
		c4.803-18.472,7.623-38.581,8.501-59.661h44.068C434.518,304.568,428.322,324.77,418.46,342.736z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M401.652,459.001c-36.09,22.101-75.928,32.604-115.328,32.604c-74.477-0.008-147.146-37.567-188.884-105.721
		c-22.102-36.09-32.604-75.929-32.604-115.329c0.009-74.485,37.568-147.129,105.73-188.884L159.92,64.288
		C85.503,109.868,44.432,189.274,44.449,270.555c-0.009,43.022,11.506,86.626,35.608,125.974
		C125.628,470.93,205.043,512.009,286.324,512c43.021,0,86.625-11.506,125.982-35.608l-10.654-17.382V459.001z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M244.587,69.818h95.387c9.818,0,17.787-3.317,17.787-13.152c0-9.819-18.8-19.333-28.618-19.333h-19.704
		l-40.1-36.099c-2.009-2.22-9.97-0.768-12.384-0.759c-2.98,0.017-2.33,4.778-1.182,7.547l11.718,29.311h-28.062l-15.39-24.448
		c-2.702-2.946-6.932-3.942-10.654-2.499c-3.732,1.444-6.188,5.032-6.188,9.025l-0.253,17.922v5.293
		C206.943,57.644,224.993,69.818,244.587,69.818z"
                    style="fill: rgb(120, 120, 120);"></path>
            </g>
        </svg>
        <span>{{ __('feed') }}</span>
    </a>
    {{-- <sp
    <x-nav-link :href="route('feed.timeline')" :active="request()->routeIs('feed.timeline')"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
            <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                clip-rule="evenodd" />
        </svg>
        &nbsp;{{ __('Journey') }}
    </x-nav-link>
    {{-- <span>Feed</span> --}}
    </a>


    <a href="{{ route('friend.index') }}"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 {{ request()->routeIs('friend.index') ? 'active text-gray-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
            <g>
                <path class="st0"
                    d="M256.495,96.434c26.632,0,48.213-21.597,48.213-48.205C304.708,21.58,283.128,0,256.495,0
		c-26.65,0-48.222,21.58-48.222,48.229C208.274,74.837,229.846,96.434,256.495,96.434z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M298.267,119.279h-42.271h-42.271c-23.362,0-48.779,25.418-48.779,48.788v162.058
		c0,11.685,9.463,21.156,21.148,21.156c5.743,0,0,0,14.756,0l8.048,138.206c0,12.434,10.078,22.513,22.513,22.513
		c5.244,0,14.923,0,24.585,0c9.671,0,19.35,0,24.593,0c12.434,0,22.513-10.078,22.513-22.513l8.04-138.206
		c14.764,0,9.013,0,14.764,0c11.676,0,21.148-9.471,21.148-21.156V168.067C347.054,144.697,321.636,119.279,298.267,119.279z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M104.141,149.083c23.262,0,42.105-18.85,42.105-42.104c0-23.262-18.843-42.112-42.105-42.112
		c-23.27,0-42.104,18.851-42.104,42.112C62.037,130.232,80.871,149.083,104.141,149.083z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M408.716,149.083c23.27,0,42.104-18.85,42.104-42.104c0-23.262-18.834-42.112-42.104-42.112
		c-23.253,0-42.104,18.851-42.104,42.112C366.612,130.232,385.463,149.083,408.716,149.083z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M137.257,169.024h-33.548h-36.92c-20.398,0-42.595,22.213-42.595,42.612v141.526
		c0,10.212,8.264,18.476,18.468,18.476c5.018,0,0,0,12.884,0l7.024,120.704c0,10.852,8.805,19.658,19.666,19.658
		c4.577,0,13.024,0,21.473,0c8.439,0,16.895,0,21.472,0c10.861,0,19.666-8.805,19.666-19.658l7.016-120.704v-6.849
		c-8.98-8.856-14.606-21.082-14.606-34.664V169.024z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M445.211,169.024h-36.928h-33.54v161.101c0,13.582-5.626,25.808-14.615,34.664v6.849l7.017,120.704
		c0,10.852,8.814,19.658,19.674,19.658c4.578,0,13.025,0,21.464,0c8.456,0,16.904,0,21.481,0c10.862,0,19.659-8.805,19.659-19.658
		l7.032-120.704c12.883,0,7.865,0,12.883,0c10.204,0,18.468-8.265,18.468-18.476V211.636
		C487.806,191.237,465.61,169.024,445.211,169.024z"
                    style="fill: rgb(120, 120, 120);"></path>
            </g>
        </svg>
        <span>{{ __('friends') }}</span>
    </a>

    {{-- <x-nav-link :href="route('friend.index')" :active="request()->routeIs('friend.index')"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path
                d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
            <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z"
                clip-rule="evenodd" />
        </svg>
        {{ __('Travelers') }}
    </x-nav-link>
    <span>Friends</span>
    </a> --}}


    <a href="{{ route('card.index') }}"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 {{ request()->routeIs('card.index') ? 'active text-gray-600' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-6 w-6">
            <g>
                <path class="st0"
                    d="M0,250.822c0,69.352,56.216,125.582,125.568,125.582h260.834C455.77,376.404,512,320.174,512,250.822H0z
		 M59.193,311.637L40.207,278.76h37.956L59.193,311.637z M89.403,311.637l18.986-32.877l18.971,32.877H89.403z M157.585,311.637
		l-18.97-32.877h37.956L157.585,311.637z M187.811,311.637l18.986-32.877l18.985,32.877H187.811z M255.993,311.637l-18.971-32.877
		h37.956L255.993,311.637z M286.218,311.637l18.985-32.877l18.971,32.877H286.218z M354.4,311.637l-18.985-32.877h37.956
		L354.4,311.637z M384.611,311.637l18.985-32.877l18.986,32.877H384.611z M452.808,311.637l-18.985-32.877h37.956L452.808,311.637z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M256.008,46.24c-76.208,0-95.268,100.029-109.559,185.767h219.11C351.275,146.269,332.216,46.24,256.008,46.24
		z"
                    style="fill: rgb(120, 120, 120);"></path>
                <path class="st0"
                    d="M330.735,431.044c-17.372-18.482-36.675-28.434-73.343-18.482c-36.668-9.952-55.972,0-73.343,18.482
		c-17.364,18.482-38.593,11.373-38.593,11.373c9.655,12.795,65.62,46.916,111.936-2.843c46.316,49.759,102.28,15.638,111.936,2.843
		C369.328,442.417,348.099,449.525,330.735,431.044z"
                    style="fill: rgb(120, 120, 120);"></path>
            </g>
        </svg>
        <span>{{ __('myCard') }}</span>
    </a>

    {{-- <x-nav-link :href="route('card.index')" :active="request()->routeIs('card.index')"
        class="flex flex-col items-center gap-1 text-gray-400 transition duration-100 hover:text-gray-500 active:text-gray-600">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd"
                d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                clip-rule="evenodd" />
        </svg>
        {{ __('my card') }}
    </x-nav-link>
    <span>Profile</span>
    </a> --}}
    <span>&nbsp;</span>
</nav>

<style>
    .active svg polygon {
        fill: #FFE600 !important;
    }

    .active path {
        fill: #FFE600 !important;
    }

    .active span {
        color: #FFE600 !important;
    }
</style>
