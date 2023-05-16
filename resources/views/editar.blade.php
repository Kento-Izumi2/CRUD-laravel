<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento de Serviços</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js'    
    ])

</head>
<body> 
	<div class="container">
		<div class="row">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
				<a class="navbar-brand" href="">SISTEMA WEB</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="{{url('/')}}">Cadastrar<span class="sr-only"></span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link"  href="{{url('consultar')}}">Consultar</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
        <form style="background-color: #FFFFFF; padding:0px 20px 20px 20px" method="post" action="{{url('atualizar')}}">
			@csrf
			<div class="container">
				<div class="form-group">
					<div class="container"><br>
						<h3> <label> Agendamento de Potenciais Clientes</label></h3>
						<label>Sistema utilizado para agendamento de serviços.</label><br><br>
						<input type="hidden" name="cid" value="{{$info ->id}}">
						<div class="form-group">
							<label>Nome:</label>
							<input type="text" class="form-control" name="Nome" autocomplete="off"  placeholder="Nome do Cliente" value="{{$info -> Nome}}">

						</div>
						<br>
						<div class="form-group">
							<label>Telefone:</label>
							<input type="text" class="form-control" name="Telefone" autocomplete="off" placeholder="(xx) xxxxx - xxxx"  value="{{$info -> Telefone}}" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.keyCode == 46 || event.keyCode == 8;">

						</div>
						<br>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Origem</label>
							<select class="form-control" required name="Origem" id="txtOrigem" value="{{$info -> Origem}}">
									<option>Celular</option>
									<option>Fixo</option>
									<option>Whatsapp</option>
									<option>Facebook</option>
									<option>Instagram</option>
									<option>Google Meu Negocio</option>
								</select>
						</div>

						<br>
							<div class="form-group">
								<label for="exampleFormControlInput1">Data do Contato:</label>
								<input type="date" class="form-control" required name="DataContato" id="txtDataContato" value="{{$info -> DataContato}}">
							</div>
                            <br>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Observação</label>
								<textarea class="form-control" name="Obervacao" id="Observacao" rows="3" value="{{$info -> Obervacao}}"></textarea >
							</div>
                            <br>
							<button type="submit" class="btn btn-primary">Editar</button>
						</form>
		</form>


	</div>



</body>

</html>