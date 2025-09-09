<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
        rel="stylesheet"
    />
    <style>
        body {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body class="bg-white">
    <header class="bg-[#FFE6E6] flex items-center px-6 py-4">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 rounded-lg bg-[#FFD9D9] flex items-center justify-center"
                aria-label="Logo with text L!"
            >
                <span class="text-white font-extrabold text-lg select-none">L!</span>
            </div>
            <h1 class="font-extrabold text-black text-lg select-none">Laporin!</h1>
        </div>
    </header>

    <main class="flex justify-center items-center min-h-[calc(100vh-56px)] px-4">
        <section
            class="bg-[#FFE6E6] rounded-xl w-full max-w-[480px] p-8 relative"
            aria-label="Login Admin form"
        >
            <!-- Panah kembali ke Home -->
            <a
                href="{{ route('home') }}"
                class="absolute top-4 left-4 text-[#FFB6B6] text-xs flex items-center gap-1 select-none hover:text-[#FF9999]"
            >
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>

            <div
                class="w-20 h-20 rounded-full bg-white flex items-center justify-center mx-auto mb-6"
                aria-hidden="true"
            >
                <i class="fas fa-user text-[#FFB6B6] text-4xl"></i>
            </div>

            <h2 class="text-center font-bold text-black text-xl mb-8 select-none">
                Login Admin
            </h2>

            <form action="{{ route('auth.login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label
                        for="username"
                        class="block text-sm font-medium text-black mb-2 select-none"
                    >Username</label>
                    <div
                        class="relative mb-1 rounded-md border border-[#FFE6E6] bg-[#FFE6E6] focus-within:border-[#FFB6B6] @error('username') border-red-400 @enderror"
                    >
                        <input
                            id="username"
                            name="username"
                            type="text"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            class="w-full bg-[#FFE6E6] text-sm text-[#FFB6B6] placeholder-[#FFB6B6] rounded-md py-3 pl-4 pr-12 outline-none"
                        />
                        <i
                            class="fas fa-user absolute right-4 top-1/2 -translate-y-1/2 text-[#FFB6B6] text-sm pointer-events-none"
                        ></i>
                    </div>
                    @error('username')
                        <p class="text-red-500 text-xs mb-3">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label
                        for="password"
                        class="block text-sm font-medium text-black mb-2 select-none"
                    >Password</label>
                    <div
                        class="relative mb-1 rounded-md border border-[#FFE6E6] bg-[#FFE6E6] focus-within:border-[#FFB6B6] @error('password') border-red-400 @enderror"
                    >
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Masukkan password"
                            class="w-full bg-[#FFE6E6] text-sm text-[#FFB6B6] placeholder-[#FFB6B6] rounded-md py-3 pl-4 pr-12 outline-none"
                        />
                        <i
                            class="fas fa-lock absolute right-4 top-1/2 -translate-y-1/2 text-[#FFB6B6] text-sm pointer-events-none"
                        ></i>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mb-5">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-white text-[#FFB6B6] text-sm font-semibold rounded-md py-3 flex items-center justify-center gap-2 select-none hover:bg-gray-50 transition-colors mt-8"
                >
                    <i class="fas fa-sign-in-alt"></i> Masuk Admin
                </button>
            </form>

            <hr class="border-t border-[#FFB6B6] mt-8 mb-4" />
            <p class="text-xs text-[#FFB6B6] text-center select-none">
                Sistem Admin Dashboard
            </p>
        </section>
    </main>
</body>
</html>
