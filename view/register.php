<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="styles/global.css" />
    
    <title>Devitter | Register</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="scripts/tailwind-config.js"></script>
  </head>

  <body class="bg-gray-900 text-primary-900">
    
    <div class="flex container xl-auto mx-auto">
      <div class="flex w-screen h-screen flex-col justify-between items-start">
          <div>
            <img class="w-9" src="../assets/images/bird.svg" alt="Bird">
            <p class="text-slate-200">Devitter</p>
          </div>
          <div class="flex flex-col gap-4">
            <p class="text-slate-200 font-bold text-5xl">Crie uma nova conta<span class="text-emerald-500">.</span></p>
            <p class="text-slate-200 text-xl">Já possui uma conta? <a href="login.php" class="text-emerald-500">Entre</a></p>
            <form class="grid grid-cols-2 gap-4">
              <input type="text" placeholder="Nome" class="py-2 px-2 bg-gray-700 placeholder:text-slate-200 text-slate-200 rounded-md border-solid focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
              <input type="text" placeholder="Username" class="py-2 px-2 bg-gray-700 placeholder:text-slate-200 text-slate-200 rounded-md border-solid focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
              <input type="email" placeholder="E-mail" class="grid col-span-2 py-2 px-2 bg-gray-700 placeholder:text-slate-200 text-slate-200 rounded-md border-solid focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
              <input type="password" placeholder="Senha" class="grid col-span-2 py-2 px-2 bg-gray-700 placeholder:text-slate-200 text-slate-200 rounded-md border-solid focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
              <input type="password" placeholder="Confirmar Senha" class="grid col-span-2 py-2 px-2 bg-gray-700 placeholder:text-slate-200 text-slate-200 rounded-md border-solid focus:outline-none focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500">
              <button class="py-3 bg-gray-700 text-slate-200 font-bold mt-4 rounded-2xl hover:brightness-125 hover:duration-200">Voltar</button>
              <button class="py-3 bg-emerald-500 text-slate-200 font-bold mt-4 rounded-2xl hover:brightness-125 hover:duration-150">Criar conta</button>
            </form>
          </div>
          <div></div>
      </div>
    </div>

  </body>
</html>