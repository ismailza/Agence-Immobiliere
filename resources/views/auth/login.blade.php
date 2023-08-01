<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Se connecter</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
  <div class="conteiner">
    <div class="m-auto d-flex align-content-center" style="width: 320px;">
      <form action="" method="post" class="vstack gap-2">
        <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>
        @include('shared.alerts')
        @csrf
        @include('shared.input', ['class'=>'md-4','type'=>'email','label'=>'Email','name'=>'email','placeholder'=>'Votre email'])
        @include('shared.input', ['class'=>'md-4','type'=>'password','label'=>'Mot de passe','name'=>'password','placeholder'=>'Votre mot de passe'])
        
        @include('shared.checkbox', ['name'=>'remember', 'label'=> 'Remember me'])
        <div class="mt-4">
          <button class="btn btn-primary w-100" type="submit">Se connecter</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>