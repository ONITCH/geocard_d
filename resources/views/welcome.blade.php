<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GEOCARD</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        /* body {
            background-image: url('/image/top.png');
            background-size: 100% auto;
            background-position: center top;
            background-repeat: no-repeat;
        } */

        body {
            position: relative;
            min-height: 100vh;
            background-color: #e8e8e8;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 60px;
            /* フッターの高さに合わせて値を調整 */
            background-color: #f5f5f5;
        }

        @media (max-width: 640px) {
            footer {
                height: 80px;
                /* スマートフォン向けにフッターの高さを変更 */
            }
        }
    </style>
    </style>
</head>

<body>
    <div>
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 px-6 py-4 sm:hidden">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500"
                        style="background-color: rgb(255, 225, 0); padding:8px 10px 8px 10px; border-radius:30px;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500"
                        style="background-color: rgb(255, 225, 0); padding:8px 10px 8px 10px; border-radius:30px;">LOG
                        IN</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-2 text-sm text-gray-700 dark:text-gray-500"
                            style="background-color: rgb(255, 225, 0); padding:8px 10px 8px 10px; border-radius:30px;">新規登録</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-center pt-8 sm:justify-start sm:pt-0">
                <a href="/" class="flex items-center">
                    <div style="margin-top:40px;">
                        <img src="/image/top2.png" alt="card"
                            style=" margin-top:50px; max-width: 80%; height:auto; display: block; margin: 0 auto;">
                    </div>
                    {{-- <img src="{{ asset('/image/logobig.png') }}"
                        style="height:80px; margin-top:30px; margin-bottom:15px;"> --}}
                    {{-- <h1 class="ml-2">GEOCARD</h1> --}}
                </a>
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <h1 style="font-size: 24px;">▼</h1>
                {{-- <h1 style="font-size: 24px;">「デジタル旅名刺」</h1> --}}
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <img src="/image/topinfo1.png" alt="info1"
                    style=" margin-top:50px; max-width: 80%; height:auto; display: block; margin: 0 auto;">
                <div
                    style="background-color:white; max-width: 80%;height:auto; display: block; margin: 0 auto; font-size:12px; padding:10px 10px 20px 10px;">
                    <div
                        style="background-color: rgb(235, 235, 235); padding:10px; margin:10px;font-size:15px; border-radius:15px;">
                        <div>旅で出会った人と名刺交換。</div>
                        <div>現実の出会いに、価値がある。</div>
                    </div>
                    <div style="display:
                            flex; margin-top:20px;">
                        <img src="/image/topimage1.png" alt="" style="width:70px; margin:10px;">
                        <div style="display:flex col; text-align:left; margin-right: 10px;">
                            <p style="font-size: 12px; padding-top:12px;">QRコードで簡単に相手の<br>旅名刺をゲット！</p>
                            <p>長く続く気楽なコミュニケーションを始めよう</p>
                        </div>
                    </div>
                    {{-- <p style=" padding-top:10px;"></p> --}}

                </div>
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <h1 style="font-size: 24px;">▼</h1>
                {{-- <h1 style="font-size: 24px;">「デジタル旅名刺」</h1> --}}
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <img src="/image/topinfo2.png" alt="info1"
                    style=" margin-top:50px; max-width: 80%; height:auto; display: block; margin: 0 auto;">
                <div
                    style="background-color:white; max-width: 80%;height:auto; display: block; margin: 0 auto; font-size:12px; padding:10px 10px 20px 10px;">
                    <div
                        style="background-color: rgb(235, 235, 235); padding:10px; margin:10px;font-size:15px; border-radius:15px;">
                        <div>たくさんのテンプレートから</div>
                        <div>あなた好みのオリジナル名刺を作成</div>
                    </div>
                    <div style="display:
                            flex; margin-top:20px;">
                        <div style="display:flex col; text-align:left; margin-left: 10px;">
                            <p style="font-size: 12px; padding-top:12px;">１分でカンタン名刺作成！</p>
                            <p>たくさんのGEOCARDをコレクションしたくなる！</p>
                        </div>
                        <img src="/image/topimage2.png" alt="" style="width:70px; margin:10px;">
                    </div>
                    {{-- <p style=" padding-top:30px;"></p> --}}

                </div>
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <h1 style="font-size: 24px;">▼</h1>
                {{-- <h1 style="font-size: 24px;">「デジタル旅名刺」</h1> --}}
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <img src="/image/topinfo3.png" alt="info1"
                    style=" margin-top:50px; max-width: 80%; height:auto; display: block; margin: 0 auto;">
                <div
                    style="background-color:white; max-width: 80%;height:auto; display: block; margin: 0 auto; font-size:12px; padding:10px 10px 20px 10px;">
                    <div
                        style="background-color: rgb(235, 235, 235); padding:10px; margin:10px;font-size:15px; border-radius:15px;">
                        <div>次の旅行の予定を書き込み。</div>
                        <div>みんなの旅情報が <div></div>
                            コミュニケーションのきっかけに</div>
                    </div>
                    <div style="display:
                            flex; margin-top:20px;">
                        <img src="/image/topimage3.png" alt="" style="width:70px; height:100px; margin:10px;">
                        <div style="display:flex col; text-align:left; margin-right: 10px;">
                            <p style="font-size: 12px; padding-top:12px;">
                                みんなの次の旅先がわかるから<br>気軽に連絡するきっかけに。<br>コミュニケーションを<br>生み出します。</p>
                            <p>再会のきっかけにも。</p>
                        </div>
                    </div>


                </div>
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <h1 style="font-size: 24px;">▼</h1>
                {{-- <h1 style="font-size: 24px;">「デジタル旅名刺」</h1> --}}
            </div>
            <div class="mt-8 text-center" style="margin:10px 0 80px 0;">
                <img src="/image/topinfo4.png" alt="info1"
                    style=" margin-top:50px; max-width: 80%; height:auto; display: block; margin: 0 auto;">
                <div
                    style="background-color:white; max-width: 80%;height:auto; display: block; margin: 0 auto; font-size:12px; padding:10px 10px 20px 10px;">
                    <div
                        style="background-color: rgb(235, 235, 235); padding:10px; margin:10px;font-size:15px; border-radius:15px;">
                        <div>SNSより気楽。</div>
                        <div>だから繋がっていられる</div>
                    </div>
                    <div style="display:
                            flex; margin-top:20px;">
                        <div style="display:flex col; text-align:left; margin-left: 10px;">
                            <p style="font-size: 12px; padding-top:12px;">あえて機能はシンプル。<br>知り合いだから気張る必要もなし。<br>だから続く。</p>

                            <p>さっそく始めよう！</p>
                        </div>
                        <img src="/image/topimage4.png" alt="" style="width:70px; height:90px; margin:10px;">
                    </div>

                    <div style="margin-top:30px; margin-bottom:20px;">
                        @auth
                            {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500"
                                style="background-color: rgb(255, 225, 0); padding:8px 10px 8px 10px; border-radius:30px;">Dashboard</a> --}}
                        @else
                            {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500"
                                style="background-color: rgb(255, 225, 0); padding:8px 10px 8px 10px; border-radius:30px;">LOG
                                IN</a> --}}

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-2 text-sm text-gray-700 dark:text-gray-500"
                                    style="background-color: rgb(255, 225, 0); padding:8px 14px 8px 14px; border-radius:30px;">GEOCARDを作成する</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="mt-8 text-center" style="margin-top:10px;">
                <h1 style="font-size: 24px;">▼</h1>
                {{-- <h1 style="font-size: 24px;">「デジタル旅名刺」</h1> --}}
            </div>
        </div>
    </div>

    <footer style="height:60px; ">
        <div class="text-center">
            <img src="image/logobig.png" alt="" style="height:30px; margin-top:15px;">
        </div>
    </footer>
    <!-- jQuery、Popper.js、Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
