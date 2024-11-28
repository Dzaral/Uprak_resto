<html>

<head>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
  <style>
    body {
      font-family: "Inter", sans-serif;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</head>

<body class="min-h-screen bg-gray-900 text-gray-100 flex justify-center">
  <div class="max-w-screen-xl m-0 sm:m-20 bg-gray-800 shadow sm:rounded-lg flex justify-center flex-1">
    @if (session('success'))
    <div class="alert alert-info">
      {{ session('success') }}
    </div>
    @endif
    <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
      <div>
        <img src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png" class="w-32 mx-auto" />
      </div>
      <div class="mt-12 flex flex-col items-center">
        <h1 class="text-2xl xl:text-3xl font-extrabold text-center">
          Silahkan Login terlebih dahulu
        </h1>
        <div class="w-full flex-1 mt-8">
          <div class="mx-auto max-w-xs">
            <form action="" method="post">
              @csrf
              @if (session('error'))
              <div class="alert alert-danger">
                {{ session('error') }}
              </div>
              @endif
              <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-400 text-sm focus:outline-none focus:border-gray-500 focus:bg-gray-600" type="text" name="username" id="username" placeholder="Username" />
              <input class="w-full px-8 py-4 rounded-lg font-medium bg-gray-700 border border-gray-600 placeholder-gray-400 text-sm focus:outline-none focus:border-gray-500 focus:bg-gray-600 mt-5" type="password" name="password" id="password" placeholder="Password" />
              <button class="mt-5 tracking-wide font-semibold bg-indigo-600 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="8.5" cy="7" r="4" />
                  <path d="M20 8v6M23 11h-6" />
                </svg>
                <span class="ml-3">login</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="flex-1 bg-gray-700 text-center hidden lg:flex">
      <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
      </div>
    </div>
  </div>
</body>

</html>