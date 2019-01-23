<section class="slice-lg has-bg-cover bg-size-cover" style="background-image: url(<?=base_url("assets/images/backgrounds/login_background.jpg")?>); background-position: bottom center;">

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-title">
						<h5 class="heading heading-5 strong-500">
							Sign in to your account
						</h5>
					</div>
					<div class="card-body">
						<?php
							$attributes = array(
								'name' => 'productForm',
								'class' => 'form-default',
								'id' => 'form_validation',
								'data-toggle' => 'validation',
								'novalidate' => '',
								'role'=>'form'
							);
							echo form_open('handlers/handle/login/', $attributes);
							$account = $this->session->flashdata('accountpost');
							
							$postdata = $this->session->flashdata('loginpost'); 		
							if($postdata['loginid']!=""){
								$valuser=$postdata['loginid'];
								$valpass=$postdata['password'];
							}elseif($this->input->cookie('fcuser')!=""){
								$valuser=$this->input->cookie('fcuser');
								$valpass=$this->input->cookie('fcpass');
							}else{
								$valuser="";
								$valpass="";
							
							}
							
							echo $this->utilities->
								show_notification(
								$this->session->flashdata('flag'),
								$this->session->flashdata('message')
								);						
						?>
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<label>Email or Phone Number</label>
										<input type="text" value="<?php echo $valuser?>" name="loginid" class="form-control form-control-lg" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="form-group has-feedback">
										<label>Password</label>
										<input type="password" class="form-control form-control-lg" name="password" value="<?php echo $valpass?>" required="required" >
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="checkbox">
										<input type="checkbox" id="chkRemember" name="remember">
										<label for="chkRemember">Remember me</label>
									</div>
								</div>
							</div>
							<input type="submit" class="btn btn-styled btn-lg btn-block btn-base-1 mt-4" value="Sign in" style="cursor:pointer" />
							
							<?php if($this->input->get('redir')!=""&&$this->input->get('nxturl')!=""){?>
								<input type="hidden" name="redir" value="true"/>
								<input type="hidden" name="nxturl" value="<?php echo $this->input->get('nxturl')?>"/>
							<? }?>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>