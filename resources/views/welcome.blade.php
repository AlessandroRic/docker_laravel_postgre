<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

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
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
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
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
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
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <svg id="eCMqzeFQDit1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1024 576" shape-rendering="geometricPrecision" text-rendering="geometricPrecision">
                    <ellipse rx="191.060359" ry="123.719413" transform="matrix(1.20217 0 0 1.829966 512 288)"
                        fill="#d2dbed" stroke-width="0" />
                    <ellipse rx="191.060359" ry="123.719413" transform="matrix(.549183 0 0 0.811386 512 288)"
                        fill="#8dabe6" stroke-width="0" /><text dx="0" dy="0"
                        font-family="&quot;eCMqzeFQDit1:::Concert One&quot;" font-size="150" font-weight="400"
                        transform="matrix(1.155059 0 0 1.032689 52.241751 348.522728)" stroke-width="0">
                        <tspan y="0" font-weight="400" stroke-width="0">
                            <![CDATA[Record Shop]]>
                        </tspan>
                    </text>
                    <style>
                        <![CDATA[
                        @font-face {
                            font-family: 'eCMqzeFQDit1:::Concert One';
                            font-style: normal;
                            font-weight: 400;
                            src: url(data:font/ttf;charset=utf-8;base64,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) format('truetype');
                        }
                        ]]>
                    </style>
                </svg>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                            <path
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{asset('files/BoilerPlate_colection.json')}}" download
                                class="underline text-gray-900 dark:text-white">Documenta????o Postman</a></div>
                    </div>

                    <div class="ml-12">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            Colection Postman para testes da API, contendo as requisi????es necess??rias desde a cria????o de um "disco" at?? a venda do mesmo.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
