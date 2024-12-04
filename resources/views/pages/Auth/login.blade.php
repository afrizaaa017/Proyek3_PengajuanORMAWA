<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-polban.png') }}" />
    <title>POLBAN SCHOLARSHIP</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Main Styling -->
    <link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5') }}" rel="stylesheet" />
    
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="overflow-hidden">
    <main class="flex items-center justify-center h-screen bg-gray-100">
        <section class="relative flex flex-col lg:flex-row w-full max-w-4xl h-auto lg:h-[30rem] rounded-3xl overflow-hidden shadow-lg">
            <!-- First Column (App Name + Background Image + Overlay) -->
            <div class="relative lg:w-1/2 w-full h-64 lg:h-full bg-cover bg-center flex items-start justify-center" style="background-image: url('{{ asset('assets/img/login/login-bg.png') }}');">
                <div class="absolute inset-0 bg-black opacity-30"></div>
                <div class="relative z-10 p-8">
                    <h1 class="text-3xl font-bold text-white">
                        Sistem Informasi Kemahasiswaan Polban
                    </h1>
                </div>
            </div>        
    
            <!-- Second Column (Login, Forgot Password, and Reset Password Forms) -->
            <div class="w-full lg:w-1/2 flex flex-col p-10 bg-white relative">
                <!-- Login Form -->
                <div id="loginForm" class="absolute inset-0 transition-transform duration-700 ease-in-out flex flex-col justify-between p-10 bg-white">
                    <div class="title mb-6">
                        <h1 class="text-2xl font-bold">Login</h1>
                    </div>
                    <form method="POST" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="email" class="block pb-3 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="focus:shadow-soft-primary-outline text-sm block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-700 focus:border-fuchsia-300 focus:outline-none transition-shadow" placeholder="example@polban.ac.id">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="password" class="block pb-3 text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="focus:shadow-soft-primary-outline text-sm block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-700 focus:border-fuchsia-300 focus:outline-none transition-shadow" placeholder="********">
                                @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <span class="pt-2 block">Forgot your password? <a href="#" id="forgotPasswordLink" class="text-blue-500"><strong>Click here</strong></a></span>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-white uppercase transition-all bg-orange-500 hover:bg-orange-700 rounded-lg shadow-md hover:scale-105 hover:shadow-lg focus:ring-2 focus:ring-orange-400 focus:outline-none">
                                Login
                            </button>
                        </div>
                    </form>
                </div>
    
                <!-- Forgot Password Form -->
                <div id="forgotPasswordForm" class="absolute inset-0 transform translate-x-full transition-transform duration-700 ease-in-out flex flex-col justify-between p-10 bg-white">
                    <div class="title mb-6">
                        <h1 class="text-2xl font-bold">Forgot Password</h1>
                    </div>
                    <form id="forgotPasswordFormSubmit">
                        @csrf
                        <div class="space-y-5"> 
                            <div>
                                <label for="reset-email" class="block pb-3 text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="reset-email" class="focus:shadow-soft-primary-outline text-sm block w-full rounded-lg border border-gray-300 px-3 py-2 text-gray-700" placeholder="example@polban.ac.id" required>
                            </div>
                            <div>
                                <label for="auth_code" class="block pb-3 text-sm font-medium text-gray-700">Kode Autentikasi</label>
                                <input type="text" name="auth_code" id="auth_code" class="border border-gray-300 rounded-lg w-full px-4 py-2" placeholder="123456" required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-white uppercase bg-orange-500 hover:bg-orange-700 rounded-lg">
                                Verify Code
                            </button>
                        </div>
                    </form>
                </div>
    
                <!-- Reset Password Form -->
                <div id="resetPasswordForm" class="absolute inset-0 transform translate-x-full transition-transform duration-700 ease-in-out flex flex-col justify-between p-10 bg-white hidden">
                    <div class="title mb-6">
                        <h1 class="text-2xl font-bold">Reset Password</h1>
                    </div>
                    <form id="resetPasswordFormSubmit">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label for="password" class="block pb-3 text-sm font-medium text-gray-700">Password Baru</label>
                                <input type="password" name="password" id="password" class="focus:shadow-soft-primary-outline text-sm block w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block pb-3 text-sm font-medium text-gray-700">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="focus:shadow-soft-primary-outline text-sm block w-full rounded-lg border border-gray-300 px-3 py-2" required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="inline-block w-full px-6 py-3 font-bold text-white uppercase bg-orange-500 hover:bg-orange-700 rounded-lg">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
    
                <!-- Success Message -->
                <div id="resetSuccess" class="absolute inset-0 hidden flex flex-col justify-center items-center p-10 text-center">
                    <h1 class="text-2xl font-bold mb-4">Password Changed Successfully</h1>
                    <p class="text-lg text-gray-700 mb-8">Your password has been successfully updated!</p>
                    <a href="#" id="backToLoginAfterSuccess" class="text-blue-500"><strong>Back to Login</strong></a>
                </div>
            </div>
        </section>
    </main>
    

    <!-- JavaScript Plugins -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="https://buttons.github.io/buttons.js" async defer></script>
    <script src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>