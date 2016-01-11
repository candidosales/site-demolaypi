<h2 class="widgettitle"><span class="icon-mail" aria-hidden="true"></span>E-mail</h2>
	 		<!--<form method="post" target="_blank" action="https://www.google.com/a/demolaypi.org.br/LoginAction2?service=mail">
			<p>
				<label for="login" class="lbl-login">Usuário:</label>
				<input type="hidden" name="continue" id="continue" value="http://mail.google.com/a/demolaypi.org.br/">
				<input type="hidden" name="service" id="service" value="mail">
				<input type="hidden" name="rm" id="rm" value="false">
				<input type="hidden" name="timeStmp" id="timeStmp" value="">
				<input type="hidden" name="secTok" id="secTok" value="">
				<input type="hidden" name="GALX" value="PblgPudct-w">
				<input type="text" name="Email" id="Email" size="18" value="" class="gaia le val"></p>
			<p>
				<label for="senha" class="lbl-login">Senha:</label>
				<input type="password" name="Passwd" id="Passwd" size="18" class="gaia le val"></p>
							<input type="submit" value="Login"/>
			</form>-->

	 	<form id="form_webmail" method="post" action="https://www.google.com/a/demolaypi.org.br/LoginAction2?service=mail">
			 <label>Nome de usuário</label>
			  <div class="row collapse">
	          <div class="large-5 mobile-three columns">
	            <input type="text" placeholder="usuário" name="Email" id="Email">
	          </div>
	          <div class="large-7 mobile-one columns">
	            <span class="postfix">@demolaypi.org.br</span>
	          </div>
	        </div>
	        
	        <!--<label>Senha</label>
	        <input type="password" id="Passwd" name="Passwd">-->

			<input type="hidden" name="dsh" id="dsh"           value="7523972394555048111" />
	        <input type="hidden" name="continue" id="continue" value="http://mail.google.com/a/demolaypi.org.br/">
			<input type="hidden" name="service" id="service" value="mail">
			<input type="hidden" name="rm" id="rm" value="false">
			<input type="hidden" name="timeStmp" id="timeStmp" value="">
			<input type="hidden" name="secTok" id="secTok" value="">
			<input type="hidden" name="GALX" value="PblgPudct-w">       
	        <input type="submit" value="Login" id="signIn" name="signIn" class="button tiny">
		</form>