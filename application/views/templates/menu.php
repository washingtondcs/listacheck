<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<span style="padding-right: 30px;"><a class="navbar-brand" href="#"><img class="img img-responsive" alt="logo" src="<?php echo base_url('imgs/logoCheck.png')?>"></a></span>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse menu-navegacao"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			
			   <li class=""><a class="visible-print" href="#home"></a><a href="<?php echo site_url('home'); ?>"><span class="glyphicon glyphicon-home"></span> Home <span
						class="sr-only">(current)</span></a></li>
						
						
				<li class=""><a class="visible-print" href="#tarefas"></a><a href="<?php echo site_url('tarefas'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Tarefas <span
						class="sr-only">(current)</span></a></li>
						
				<li class=""><a class="visible-print" href="#sobre"></a><a href="<?php echo site_url('sobre');?>"><span class="glyphicon glyphicon-info-sign"></span> Sobre <span
						class="sr-only">(current)</span></a></li>

				
			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>