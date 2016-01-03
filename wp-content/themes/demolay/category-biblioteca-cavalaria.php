<?php get_header(); ?>

<div class="row">
	<div id="library" class="eight columns">

<?php
	/*
	 Só exibe o formulário se o usuário não estiver logado
	*/
	if (!is_user_logged_in()){?>

		<h2><span class="icon-locked" aria-hidden="true"></span>Página restrita</h2>
				<?php
		 /* Form nativo do WP, aí só muda o CSS */
		  		wp_login_form(); 
		  ?>
		<?php
	 	}else{// Se estiver logado	?>
                 <!-- Se estiver logado é isso que aparece -->

		<h2><span class="icon-book" aria-hidden="true"></span>Biblioteca da Cavalaria</h2>
		<div class="row">
			<div class="twelve columns">
				<section >
					<h3>PACC</h3>
					<dl class="tabs">
						<dd class="active"><a href="#simple1">Introdução</a></dd>
						<dd><a href="#simple2">Apostilas</a></dd>
						<dd><a href="#simple3">Modelos</a></dd>
					</dl>
					<ul class="tabs-content">
						<li class="active" id="simple1Tab">
							<div class="twelve columns">
								<ul> <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/introducao/Passo a passo PACC.docx"> 
											<span class="icon-file-word " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/introducao/Passo a passo PACC.docx"> 
													Passo a passo PACC GCESP
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
								 <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/introducao/Guia do Sistema PACC.pdf"> 
											<span class="icon-file-pdf " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/introducao/Guia do Sistema PACC.pdf"> 
													Guia do Sistema PACC
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
							</ul>

						</div>
					</li>
					<li id="simple2Tab">
						<div class="twelve columns">
								<ul> <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Apostila Cavalaria.pdf"> 
											<span class="icon-file-word " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Apostila Cavalaria.pdf"> 
													Apostila Cavalaria
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
								 <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Questionario_Capela.docx"> 
											<span class="icon-file-word " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Questionario_Capela.docx"> 
													Questionário Capela
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
								 <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Trecho bom para capela.pdf"> 
											<span class="icon-file-pdf " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/apostila/Trecho bom para capela.pdf"> 
													Trecho bom para capela
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
							</ul>

						</div>


					</li>
					<li id="simple3Tab">
						<div class="twelve columns">
								<ul> <li>
									<div class="one columns">
										<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/modelo/PACC Capela - 57700.pdf"> 
											<span class="icon-file-word " aria-hidden="true"></span>
										</a>										  			 
									</div>
									<div class="eleven columns">
										<hgroup>
											<h3>
												<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/pacc/modelo/PACC Capela - 57700.pdf"> 
													PACC Capela - 57700
												</a>
											</h3>
										</hgroup>
										<p>Sem resumo</p>
									</div>
								</li>
							</ul>
						</div>
					</li>
				</ul>

			</section>
		</div><!-- six columns -->
		<div class="twelve columns">
			<section id="recent">
				<h3>Ritualística</h3>
				<dl class="tabs">
					<dd class="active"><a href="#simple4">Vídeos</a></dd>
					<dd><a href="#simple5">Slides</a></dd>
				</dl>
				<ul class="tabs-content">
					<li class="active" id="simple4Tab">
						<div class="flex-video">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/8KLe2D4qwkg" frameborder="0" allowfullscreen></iframe>
						</div>
					</li>
					<li id="simple5Tab">
						<div class="twelve columns">
							<ul>
								<li>
								<div class="one columns">
									<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Ordem da Cavalaria.ppt"> 
										<span class="icon-file-powerpoint " aria-hidden="true"></span>
									</a>										  			 
								</div>
								<div class="eleven columns">
									<hgroup>
										<h3>
											<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Ordem da Cavalaria.ppt"> 
												Ordem da Cavalaria
											</a>
										</h3>
									</hgroup>
									<p>Sem resumo</p>
								</div>	
							</li>
							<li>
								<div class="one columns">
									<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Grau de Cavaleiro - Aspectos básicos e necessários.pptx"> 
										<span class="icon-file-powerpoint " aria-hidden="true"></span>
									</a>										  			 
								</div>
								<div class="eleven columns">
									<hgroup>
										<h3>
											<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Grau de Cavaleiro - Aspectos básicos e necessários.pptx"> 
												Grau de Cavaleiro - Aspectos básicos e necessários
											</a>
										</h3>
									</hgroup>
									<p>Sem resumo</p>
								</div>	
							</li>
							<li>
								<div class="one columns">
									<a class="icon-switch" target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Desvendando_o_Grau_Capela.ppt"> 
										<span class="icon-file-powerpoint " aria-hidden="true"></span>
									</a>										  			 
								</div>
								<div class="eleven columns">
									<hgroup>
										<h3>
											<a target="_blank" href="<?php bloginfo('template_url'); ?>/biblioteca/cavalaria/ritualistica/slides/Desvendando_o_Grau_Capela.ppt"> 
												Desvendando o Grau Capela
											</a>
										</h3>
									</hgroup>
									<p>Sem resumo</p>
								</div>	
							</li>
						</ul>

					</div>



				</li>
				</ul>

			</section>
		</div><!-- six columns -->

	</div>
	<?php
	}
	?>
</div><!-- eight columns-->
<div class="four columns">
	<?php get_sidebar("cavalaria"); ?>
</div>
</div><!-- row-->
<?php get_footer(); ?>