<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - ข้อมูลส่วนตัว</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans leading-normal tracking-normal text-[#780000] min-h-screen bg-cover bg-center bg-fixed bg-no-repeat"
      style="background-image: url('{{ asset('https://i.pinimg.com/736x/c0/dc/2b/c0dc2bd0e7c07f764817e9c3ce564564.jpg') }}');">

    <!-- Navigation Bar & EP08 Auth Controls -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-[#780000]/10 shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/about-me" class="text-2xl font-black tracking-wide text-[#780000]">
                MY PORTFOLIO
            </a>

            <!-- EP08 Auth Button / User Status -->
            <div class="flex items-center gap-3">
                @auth
                    <span class="text-sm font-medium text-[#780000]/80 hidden sm:inline">
                        สวัสดี, {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-[#780000] hover:bg-[#5a0000] text-[#FDF0D5] px-4 py-2 rounded-xl text-sm font-medium transition shadow-md hover:shadow-lg">
                            Logout (ออกจากระบบ)
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="bg-[#780000] hover:bg-[#5a0000] text-[#FDF0D5] px-5 py-2 rounded-xl text-sm font-semibold transition shadow-md hover:shadow-lg">
                        Login (เข้าสู่ระบบ)
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-white hover:bg-[#FDF0D5] text-[#780000] border border-[#780000]/20 px-4 py-2 rounded-xl text-sm font-semibold transition">
                        Register
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="max-w-5xl mx-auto px-6 py-10">

        <!-- Header Profile Card -->
        <div
            class="bg-white/90 backdrop-blur rounded-3xl p-8 mb-10 border border-[#780000]/15 shadow-xl flex flex-col md:flex-row items-center gap-8 transition hover:shadow-2xl">
            <div class="relative">
                <img class="h-36 w-36 rounded-full object-cover border-4 border-[#780000] shadow-md ring-4 ring-[#780000]/10"
                    src="https://i.pinimg.com/736x/60/fa/99/60fa999f748f9ce5feaf88a673c4c6e4.jpg"
                    alt="Chotika Phonphalerd">
            </div>
            <div class="text-center md:text-left">
                <span
                    class="bg-[#780000]/10 text-[#780000] text-xs font-bold uppercase tracking-widest px-3 py-1 rounded-full inline-block mb-3">
                    Student Profile
                </span>
                <h1 class="text-3xl md:text-4xl font-extrabold text-[#780000] mb-2">
                    {{ $profile->name ?? 'Chotika Phonphalerd' }}
                </h1>
                <p class="text-lg text-[#780000]/80 font-medium">
                    รหัสนักศึกษา: <span
                        class="font-bold text-[#780000] underline decoration-[#780000]/30 underline-offset-4">{{ $profile->student_id ?? '68222420010' }}</span>
                </p>
            </div>
        </div>

        <!-- รายการลิงก์งานที่เคยทำ -->
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-2xl font-black text-[#780000] tracking-tight">
                ผลงานที่ผ่านมา (Portfolio Links)
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- EP02 Link -->
            <a href="{{ url('/gallery') }}"
                class="group relative bg-white/80 hover:bg-white rounded-2xl p-6 border border-[#780000]/10 hover:border-[#780000]/40 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-[#780000]/60 uppercase tracking-wider">Assignment</span>
                        <span class="h-2 w-2 rounded-full bg-[#780000]"></span>
                    </div>
                    <h3 class="text-xl font-bold text-[#780000] group-hover:text-[#5a0000] transition mb-1">
                        Gallery
                    </h3>
                    <p class="text-sm text-[#780000]/70 mb-6">
                        เข้าชมหน้า Gallery
                    </p>
                </div>
                <div
                    class="flex items-center text-[#780000] font-bold text-sm group-hover:translate-x-1 transition-transform">
                    คลิกเพื่อเปิดหน้างาน <span class="ml-2">&rarr;</span>
                </div>
            </a>

            <!-- EP03 Link -->
            <a href="{{ url('/active/index') }}"
                class="group relative bg-white/80 hover:bg-white rounded-2xl p-6 border border-[#780000]/10 hover:border-[#780000]/40 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-[#780000]/60 uppercase tracking-wider">Assignment</span>
                        <span class="h-2 w-2 rounded-full bg-[#780000]"></span>
                    </div>
                    <h3 class="text-xl font-bold text-[#780000] group-hover:text-[#5a0000] transition mb-1">
                        Active Bootstrap
                    </h3>
                    <p class="text-sm text-[#780000]/70 mb-6">
                        เข้าชมหน้า Active Index
                    </p>
                </div>
                <div
                    class="flex items-center text-[#780000] font-bold text-sm group-hover:translate-x-1 transition-transform">
                    คลิกเพื่อเปิดหน้างาน <span class="ml-2">&rarr;</span>
                </div>
            </a>

            <!-- EP07 Link (มี Auth Middleware) -->
            <a href="{{ url('/weights') }}"
                class="group relative bg-white/80 hover:bg-white rounded-2xl p-6 border border-[#780000]/10 hover:border-[#780000]/40 shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-[#780000]/60 uppercase tracking-wider">Assignment</span>
                        <span
                            class="text-xs bg-[#780000] text-[#FDF0D5] font-bold px-2.5 py-0.5 rounded-full shadow-sm">
                            Protected
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-[#780000] group-hover:text-[#5a0000] transition mb-1">
                        Weight
                    </h3>
                    <p class="text-sm text-[#780000]/70 mb-6">
                     Login ก่อนเข้าใช้งาน
                    </p>
                </div>
                <div
                    class="flex items-center text-[#780000] font-bold text-sm group-hover:translate-x-1 transition-transform">
                    คลิกเพื่อเปิดหน้างาน <span class="ml-2">&rarr;</span>
                </div>
            </a>

        </div>

    </main>

</body>

</html>
